<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Database;
use Yajra\DataTables\DataTables;

class ReservaController extends Controller
{

    private $database;

    public function __construct()
    {
        $this->database = \App\Services\FirebaseService::connect();
    }

    public function index()
    {
        return view('admin.reservas.list');
    }

    public function new()
    {
        return view('admin.reservas.create');
    }

    public function jsonList()
{
    $firebaseData = $this->database->getReference('Reservas')->getValue();
    $reservas = [];

    $salones = $this->database->getReference('Salones')->getValue();
    $users = $this->database->getReference('Users')->getValue();


    foreach ($firebaseData as $reserva) {
        if ($reserva != null) {
            $salonNombre = isset($reserva['id_salon']) && isset($salones[$reserva['id_salon']])
                ? $salones[$reserva['id_salon']]['nombre']
                : 'Desconocido';

            $userName = isset($reserva['id_usuario']) && isset($users[$reserva['id_usuario']])
            ? $users[$reserva['id_usuario']]['Nombre']
            : 'Desconocido';

            $reservas[] = [
                'calificacion' => $reserva['calificacion'] ?? null,
                'estado' => $reserva['estado'] ?? null,
                'fecha_devolucion' => $reserva['fecha_devolucion'] ?? null,
                'fecha_reserva' => $reserva['fecha_reserva'] ?? null,
                'id' => $reserva['id'] ?? null,
                'id_salon' => $reserva['id_salon'] ?? null,
                'usuario' => $userName ?? null,
                'items' => $reserva['items'] ?? null,
                'observaciones' => $reserva['observaciones'] ?? null,
                'salon' => $salonNombre,
            ];
        }
    }

    return DataTables::of($reservas)
        ->addColumn('options', function ($reserva) {
            return '<a class="btn btn-sm btn-outline-main" href="' . route('Reservas.edit', ['id' => $reserva['id'] ?? 0]) . '"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                    <a class="btn btn-sm btn-outline-danger" href="javascript:deleteRow(' . $reserva['id'] . ')"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>';
        })
        ->addColumn('salon', function ($reserva) {
            return $reserva['salon'];
        })
        ->addColumn('usuario', function ($reserva) {
            return $reserva['usuario'];
        })
        ->rawColumns(['options'])
        ->make();
}




    public function edit($id)
    {
        $reservaRef = $this->database->getReference('Reservas')->getChild($id)->getValue();
        $salones = $this->database->getReference('Salones')->getValue();
        $users = $this->database->getReference('Users')->getValue();
        if ($reservaRef === null) {
            abort(404, 'reserva no encontrada');
        }
        $reg['reg'] = $reservaRef;

        return view('admin.reservas.edit', compact('reg','salones','users'));
    }

}
