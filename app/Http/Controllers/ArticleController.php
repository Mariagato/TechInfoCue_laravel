<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\GalleryImage;
use App\Models\InfoArticle;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ArticleController extends Controller
{
    private $article;
    private $info;

    /**
     * ArticleController constructor.
     *
     * @param Article $article
     */
    public function __construct(Article $article, InfoArticle $info)
    {
        $this->article = $article;
        $this->info    = $info;

    }

    /**
     * Muestra la lista de artículos en el CMS del rol:admin.
     * @return \Illuminate\Http\Response
     * Created by  <Rhiss.net>
     */
    public function index()
    {
        return view('admin.article.list');
    }


    /**
     * Muestra el formulario para editar o agregar un artículo.
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Created by <Rhiss.net>
     */
    public function edit($id)
    {
        $reg['option']      = 'Agregar';
        $reg['path']        = 'article';
        $reg['categories']  = Category::selectArray(0, collect([]), 'article');
        $reg['tam_gallery'] = '900px ancho x 600px de alto';
        if ($id > 0) {
            $reg['reg']        = $this->article->find($id);
            $reg['categories'] = Category::selectArray(0, collect([]), 'article', $id);
            $reg['images']     = GalleryImage::getGallery($reg['reg']->gallery_id);
            $reg['videos']     = Video::getVideos($reg['reg']->video_gallery_id);
            $reg['option']     = 'Editar';
        }

        $reg['message'] = session('message');

        return view('admin.article.edit', $reg);
    }

    /**
     * Crea o actualiza la información de un artículo.
     *
     * @param int $id
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * Created by  <Rhiss.net>
     */
    public function updateOrCreate($id = 0, Request $request)
    {
        $dat         = $request->dat;
        $info        = $request->info;
        $dat['date'] = empty($dat['date']) ? Carbon::now()->toDateString() : $dat['date'];

        if ($request->file('image')) {
            $sizes        = ['s' => [450, 350]];
            $dat['image'] = $this->article->uploadImage($request->file('image'), $sizes, 70);
        }
        if ($request->file('image_seo')) {
            $sizes        = ['s' => [600, 315]];
            $dat['image_seo'] = $this->article->uploadImage($request->file('image_seo'), $sizes, 70);
        }
        if ($id > 0) {
            $article = $this->article->find($id);
            if ($request->get('delimg')) {
                $sizes        = ['s'];
                $dat['image'] = $this->article->deleteImage($article->image, $sizes);
            }
            if ($request->get('delimg_seo')) {
                $sizes        = ['s'];
                $dat['image_seo'] = $this->article->deleteImage($article->image_seo, $sizes);
            }
            $article->update($dat);
            $info['article_id'] = $id;
            $this->info->updateLang($info);
        } else {
            $article            = $this->article->create($dat);
            $id                 = $article->id;
            $info['article_id'] = $id;
            $this->info->createLang($info);
        }
        session()->flash('message', 'Información guardada.');

        return redirect()->route('articles.edit', ['id' => $id]);
    }

    /**
     * Lista los artículos en formato JSON para mostrar con Datatable.
     * @return mixed
     * @throws \Exception
     * Created by <Rhiss.net>
     */
    public function jsonList()
    {
        $articles = $this->article->datatable();

        return DataTables::of($articles)
                         ->addColumn('options', function ($article) {
                             return '<a class="btn btn-sm btn-outline-main" href="' . route('Article',
                                     ['id' => $article->id]) . '" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i> Ver</a>
                        <a class="btn btn-sm btn-outline-main" href="' . route('articles.edit',
                                     ['id' => $article->id]) . '"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                        <a class="btn btn-sm btn-outline-danger" href="javascript:deleteRow(' . $article->id . ')"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>';
                         })
                         ->editColumn('date', function ($section) {

                             return format_date($section->date);
                         })
                         ->rawColumns(['options'])
                         ->make();
    }

    /**
     * Muestra la vista para manejar las categorías de los artículos.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Created by  <Rhiss.net>
     */
    public function categories()
    {
        $reg['parents']      = Category::where([
            'type'   => 'article',
            'parent' => 0,
            'hide'   => 0
        ])->with('info')->orderBy('position',
            'asc')->get();
        $reg['type']         = 'article';
        $reg['title_page']   = 'Categorías blog';
        $reg['title_parent'] = 'Blog';
        $reg['route_parent'] = route('articles.list');
        $reg['level_limit']  = 0;

        return view('admin.manage-categories', $reg);
    }

    /**
     * Elimina la información de un artículo de la bd.
     *
     * @param $id
     * Created by  <Rhiss.net>
     */
    public function delete($id)
    {
        echo $this->article->find($id)->delete();
    }
}
