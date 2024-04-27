<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LocationController extends Controller
{
    private $location;

    /**
     * LocationController constructor.
     *
     * @param Location $location
     */
    public function __construct(Location $location)
    {
        $this->location = $location;
    }

    /**
     * Muestra la lista de sedes en el CMS del rol:admin.
     * @return \Illuminate\Http\Response
     * Created by  <Rhiss.net>
     */
    public function index()
    {
        return view('admin.location.list');
    }


    /**
     * Muestra el formulario para editar o agregar una sede.
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Created by <Rhiss.net>
     */
    public function edit($id)
    {
        $reg['option'] = 'Agregar';
        $reg['path']   = 'location';
        if ($id > 0) {
            $reg['reg']    = $this->location->find($id);
            $reg['option'] = 'Editar';
        }

        $reg['message'] = session('message');

        return view('admin.location.edit', $reg);
    }

    /**
     * Crea o actualiza la información de una sede.
     *
     * @param int $id
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * Created by  <Rhiss.net>
     */
    public function updateOrCreate($id = 0, Request $request)
    {
        $dat = $request->dat;

        if ($request->file('image')) {
            $sizes        = ['s' => [450, 350]];
            $dat['image'] = $this->location->uploadImage($request->file('image'), $sizes, 70);
        }
        if ($id > 0) {
            $location = $this->location->find($id);
            if ($request->get('delimg')) {
                $sizes        = ['s'];
                $dat['image'] = $this->location->deleteImage($location->image, $sizes);
            }
            $location->update($dat);
        } else {
            $location = $this->location->create($dat);
            $id       = $location->id;
        }
        session()->flash('message', 'Información guardada.');

        return redirect()->route('locations.edit', ['id' => $id]);
    }

    /**
     * Lista las sedes en formato JSON para mostrar con Datatable.
     * @return mixed
     * @throws \Exception
     * Created by <Rhiss.net>
     */
    public function jsonList()
    {
        $locations = $this->location->select('id', 'name', 'city', 'address', 'phone');

        return DataTables::of($locations)
                         ->addColumn('options', function ($location) {
                             return '<a class="btn btn-sm btn-outline-main" href="' . route('locations.edit',
                                     ['id' => $location->id]) . '"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                        <a class="btn btn-sm btn-outline-danger" href="javascript:deleteRow(' . $location->id . ')"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>';
                         })
                         ->rawColumns(['options'])
                         ->make();
    }

    /**
     * Elimina la información de una sede de la bd.
     *
     * @param $id
     * Created by  <Rhiss.net>
     */
    public function delete($id)
    {
        echo $this->location->find($id)->delete();
    }
}
