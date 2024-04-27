<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Content;
use App\Models\GalleryImage;
use App\Models\InfoContent;
use App\Models\Video;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ContentController extends Controller
{
    private $content;
    private $info;

    /**
     * ContentController constructor.
     *
     * @param Content $content
     * @param InfoContent $info
     */
    public function __construct(Content $content, InfoContent $info)
    {
        $this->content = $content;
        $this->info    = $info;

    }

    /**
     * Muestra la lista de contenidos en el CMS del rol:admin.
     * @return \Illuminate\Http\Response
     * Created by  <Rhiss.net>
     */
    public function index()
    {
        return view('admin.content.list');
    }


    /**
     * Muestra el formulario para editar o agregar un contenido.
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Created by <Rhiss.net>
     */
    public function edit($id)
    {
        $reg['option'] = 'Agregar';
        $reg['path']   = 'content';

        $reg['categories'] = Category::selectArray(0, collect([]), 'content');

        if ($id > 0) {
            $reg['reg']        = $this->content->find($id);
            $reg['categories'] = Category::selectArray(0, collect([]), 'content', $id);
            $reg['images']     = GalleryImage::getGallery($reg['reg']->gallery_id);
            $reg['videos']     = Video::getVideos($reg['reg']->video_gallery_id);
            $reg['option']     = 'Editar';
        }

        $reg['message'] = session('message');

        return view('admin.content.edit', $reg);
    }

    /**
     * Crea o actualiza la información de un contenido.
     *
     * @param int $id
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * Created by  <Rhiss.net>
     */
    public function updateOrCreate($id = 0, Request $request)
    {
        $dat  = $request->dat;
        $info = $request->info;

        if ($request->file('image')) {
            $sizes        = ['b' => [900, 600], 's' => [400, 370]];
            $dat['image'] = $this->content->uploadImage($request->file('image'), $sizes, 70);
        }
        if ($request->file('image_seo')) {
            $sizes        = ['s' => [600, 315]];
            $dat['image_seo'] = $this->content->uploadImage($request->file('image_seo'), $sizes, 70);
        }
        if ($id > 0) {
            $content = $this->content->find($id);
            if ($request->get('delimg')) {
                $sizes        = ['b', 's'];
                $dat['image'] = $this->content->deleteImage($content->image, $sizes);
            }
            if ($request->get('delimg_seo')) {
                $sizes        = ['s'];
                $dat['image_seo'] = $this->content->deleteImage($content->image_seo, $sizes);
            }
            $content->update($dat);
            $info['content_id'] = $id;
            $this->info->updateLang($info);
        } else {
            $content            = $this->content->create($dat);
            $id                 = $content->id;
            $info['content_id'] = $id;
            $this->info->createLang($info);
        }
        session()->flash('message', 'Información guardada.');

        return redirect()->route('contents.edit', ['id' => $id]);
    }

    /**
     * Lista los contenidos en formato JSON para mostrar con Datatable.
     * @return mixed
     * @throws \Exception
     * Created by <Rhiss.net>
     */
    public function jsonList()
    {
        $contents = $this->content->datatable();

        return DataTables::of($contents)
                         ->addColumn('options', function ($content) {
                             $html = '<a class="btn btn-sm btn-outline-main" href="' . route('Content',
                                     ['id' => $content->id]) . '" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i> Ver</a>
                        <a class="btn btn-sm btn-outline-main" href="' . route('contents.edit',
                                     ['id' => $content->id]) . '"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>';
                             $html .= ($content->show_delete ? ' <a class="btn btn-sm  btn-outline-danger" href="javascript:deleteRow(' . $content->id . ')"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>' : '');

                             return $html;
                         })
                         ->rawColumns(['options'])
                         ->make();
    }

    /**
     * Muestra la vista para manejar las categorías de los contenidos.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Created by  <Rhiss.net>
     */
    public function categories()
    {
        $reg['parents']      = Category::where([
            'type'   => 'content',
            'parent' => 0,
            'hide'   => 0
        ])->with('info')->orderBy('position',
            'asc')->get();
        $reg['type']         = 'content';
        $reg['title_page']   = 'Categorías contenidos';
        $reg['title_parent'] = 'Contenidos';
        $reg['route_parent'] = route('contents.list');
        $reg['level_limit']  = 1;

        return view('admin.manage-categories', $reg);
    }

    /**
     * Elimina la información de un contenido de la bd.
     *
     * @param $id
     * Created by  <Rhiss.net>
     */
    public function delete($id)
    {
        echo $this->content->find($id)->delete();
    }
}
