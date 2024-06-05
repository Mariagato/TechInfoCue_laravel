<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Database;
use Yajra\DataTables\DataTables;

class PrestamoController extends Controller
{

    private $database;

    public function __construct()
    {
        $this->database = \App\Services\FirebaseService::connect();
    }

    public function index()
    {
        return view('admin.prestamos.list');
    }

    public function new()
    {
        return view('admin.prestamos.create');
    }

    public function jsonList()
{
    $firebaseData = $this->database->getReference('Prestamos')->getValue();
    $prestamos = [];
    $salones = $this->database->getReference('Salones')->getValue();
    $users = $this->database->getReference('Users')->getValue();


    foreach ($firebaseData as $prestamo) {
        if ($prestamo != null) {
            $salonNombre = isset($prestamo['id_salon']) && isset($salones[$prestamo['id_salon']])
                ? $salones[$prestamo['id_salon']]['nombre']
                : 'Desconocido';

            $userName = isset($prestamo['id_usuario']) && isset($users[$prestamo['id_usuario']])
            ? $users[$prestamo['id_usuario']]['Nombre']
            : 'Desconocido';

            $prestamos[] = [
                'calificacion' => $prestamo['calificacion'] ?? null,
                'estado' => $prestamo['estado'] ?? null,
                'fecha_devolucion' => $prestamo['fecha_devolucion'] ?? null,
                'fecha_prestamo' => $prestamo['fecha_prestamo'] ?? null,
                'id' => $prestamo['id'] ?? null,
                'id_salon' => $prestamo['id_salon'] ?? null,
                'usuario' => $userName ?? null,
                'items' => $prestamo['items'] ?? null,
                'observaciones' => $prestamo['observaciones'] ?? null,
                'salon' => $salonNombre,
            ];
        }
    }

    return DataTables::of($prestamos)
        ->addColumn('options', function ($prestamo) {
            return '<a class="btn btn-sm btn-outline-main" href="' . route('Reservas.edit', ['id' => $prestamo['id']]) . '"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                    <a class="btn btn-sm btn-outline-danger" href="javascript:deleteRow(' . $prestamo['id'] . ')"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>';
        })
        ->addColumn('salon', function ($prestamo) {
            return $prestamo['salon'];
        })
        ->addColumn('usuario', function ($prestamo) {
            return $prestamo['usuario'];
        })
        ->rawColumns(['options'])
        ->make();
}




    public function edit($id)
    {
        $PrestamoRef = $this->database->getReference('Prestamos')->getChild($id)->getValue();
        $salones = $this->database->getReference('Salones')->getValue();
        $users = $this->database->getReference('Users')->getValue();
        if ($PrestamoRef === null) {
            abort(404, 'Prestamo no encontrada');
        }
        $reg['reg'] = $PrestamoRef;

        return view('admin.Prestamos.edit', compact('reg','salones','users'));
    }

}
