<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\GalleryImage;
use App\Models\InfoService;
use App\Models\Service;
use App\Models\Video;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    private $service;
    private $info;


    /**
     * ServiceController constructor.
     *
     * @param Service $service
     * @param InfoService $info
     */
    public function __construct(Service $service, InfoService $info)
    {
        $this->service = $service;
        $this->info    = $info;

    }

    /**
     * Muestra la lista de servicios en el CMS del rol:admin.
     * @return \Illuminate\Http\Response
     * Created by  <Rhiss.net>
     */
    public function index()
    {
        return view('admin.service.list');
    }


    /**
     * Muestra el formulario para editar o agregar un servicio.
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Created by <Rhiss.net>
     */
    public function edit($id)
    {
        $reg['option'] = 'Agregar';
        $reg['path']   = 'service';

        $reg['categories'] = Category::selectArray(0, collect([]), 'service');

        if ($id > 0) {
            $reg['reg']        = $this->service->find($id);
            $reg['categories'] = Category::selectArray(0, collect([]), 'service', $id);
            $reg['images']     = GalleryImage::getGallery($reg['reg']->gallery_id);
            $reg['videos']     = Video::getVideos($reg['reg']->video_gallery_id);
            $reg['option']     = 'Editar';
        }

        $reg['message'] = session('message');

        return view('admin.service.edit', $reg);
    }

    /**
     * Crea o actualiza la información de un servicio.
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
            $dat['image'] = $this->service->uploadImage($request->file('image'), $sizes, 70);
        }
        if ($request->file('image_seo')) {
            $sizes            = ['s' => [600, 315]];
            $dat['image_seo'] = $this->service->uploadImage($request->file('image_seo'), $sizes, 70);
        }
        if ($id > 0) {
            $service = $this->service->find($id);
            if ($request->get('delimg')) {
                $sizes        = ['b', 's'];
                $dat['image'] = $this->service->deleteImage($service->image, $sizes);
            }
            if ($request->get('delimg_seo')) {
                $sizes            = ['s'];
                $dat['image_seo'] = $this->service->deleteImage($service->image_seo, $sizes);
            }
            $service->update($dat);
            $info['service_id'] = $id;
            $this->info->updateLang($info);
        } else {
            $service            = $this->service->create($dat);
            $id                 = $service->id;
            $info['service_id'] = $id;
            $this->info->createLang($info);
        }
        session()->flash('message', 'Información guardada.');

        return redirect()->route('services.edit', ['id' => $id]);
    }

    /**
     * Lista los servicios en formato JSON para mostrar con Datatable.
     * @return mixed
     * @throws \Exception
     * Created by <Rhiss.net>
     */
    public function jsonList()
    {
        $services = $this->service->datatable();

        return DataTables::of($services)
                         ->addColumn('options', function ($service) {
                             return '<a class="btn btn-sm btn-outline-main" href="' . route('Service',
                                     ['id' => $service->id]) . '" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i> Ver</a>
                        <a class="btn btn-sm btn-outline-main" href="' . route('services.edit',
                                     ['id' => $service->id]) . '"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                        <a class="btn btn-sm btn-outline  btn-outline-danger" href="javascript:deleteRow(' . $service->id . ')"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>';
                         })
                         ->rawColumns(['options'])
                         ->make();
    }

    /**
     * Muestra la vista para manejar las categorías de los servicios.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Created by  <Rhiss.net>
     */
    public function categories()
    {
        $reg['parents']      = Category::where([
            'type'   => 'service',
            'parent' => 0,
            'hide'   => 0
        ])->with('info')->orderBy('position',
            'asc')->get();
        $reg['type']         = 'service';
        $reg['title_page']   = 'Categorías servicios';
        $reg['title_parent'] = 'Servicios';
        $reg['route_parent'] = route('services.list');
        $reg['level_limit']  = 0;

        return view('admin.manage-categories', $reg);
    }

    /**
     * Elimina la información de un servicio de la bd.
     *
     * @param $id
     * Created by  <Rhiss.net>
     */
    public function delete($id)
    {
        echo $this->service->find($id)->delete();
    }

    /**
     * Lista los servicios para la tabla de ordernar.
     * @return string
     * Created by <Rhiss.net>
     */
    public function get()
    {
        $services = $this->service->orderBy('position')->with('info')->get();
        $html     = '';
        $cont     = 1;
        foreach ($services as $service) {
            $html .= '<tr id="' . $service->id . '-item"><td>' . $service->info->title . '</td></tr>';
            $cont++;
        }

        return $html;
    }

    /**
     * Ordena los servicios según el orden establecido en la tabla.
     * Created by  <Rhiss.net>
     */
    public function order(Request $request)
    {
        $i     = 0;
        $array = $request->get('data');
        $order = explode(",", $array);
        foreach ($order as $value) {
            $this->service->find($value)->update(['position' => $i]);
            $i++;
        }
    }

}
