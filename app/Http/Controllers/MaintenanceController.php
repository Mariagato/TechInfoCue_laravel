<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    private $database;
    public function __construct()
    {
        $this->database = \App\Services\FirebaseService::connect();
    }

    public function index()
    {
        $sedes = $this->database->getReference('Mantenimiento')->getValue();
        return view('admin.maintenance.list');
    }

    public function new()
    {
        $sedes = $this->database->getReference('Sedes')->getValue();

        return view('admin.maintenance.create', compact('sedes'));
    }

    public function jsonList()
    {
        $firebaseData = $this->database->getReference('Mantenimiento')->getValue();
        $mantenimientos = [];

        foreach ($firebaseData as $mantenimiento) {
            if ($mantenimiento != null) {
                $mantenimientos[] = [
                    'id' => $mantenimiento['id'],
                    'id_item' => $mantenimiento['id_item'],
                    'fecha' => $mantenimiento['fecha'],
                    'estado' => $mantenimiento['estado'],
                ];
            }
        }


        return DataTables::of($mantenimientos)
            ->addColumn('options', function ($mantenimiento) {
                return '<a class="btn btn-sm btn-outline-main" href="' . route('Maintenance.edit', ['id' => $mantenimiento['id']]) . '"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                        <a class="btn btn-sm btn-outline-danger" href="javascript:deleteRow(' . $mantenimiento['id'] . ')"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>';
            })
            ->addColumn('item', function ($mantenimiento) {
                $itemRef = $this->database->getReference('Items')->getChild($mantenimiento['id_item'])->getValue();
                return $itemRef['nombre'];
            })
            ->rawColumns(['options', 'item'])
            ->make();
    }

    public function edit($id)
    {
        $salonRef = $this->database->getReference('Salones')->getChild($id)->getValue();

        //lista de sedes
        $sedes = $this->database->getReference('Sedes')->getValue();

        if ($salonRef === null) {
            abort(404, 'Salón no encontrado');
        }

        $reg['reg'] = $salonRef;

        return view('admin.classrooms.edit', compact('reg', 'sedes'));
    }



    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer',
            'sede' => 'required|integer',
            'nombre' => 'required|string|max:255',
            'numero' => 'required|string|max:255',
            'piso' => 'required|string|max:255',
            'capacidad' => 'required|string|max:255',
            'detalles' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
        ]);

        // Obtener todas las salons
        $salonsRef = $this->database->getReference('Salones');
        $salones = $salonsRef->getValue();

        // Buscar la salon por el atributo 'id'
        $salonKey = null;
        foreach ($salones as $key => $salon) {
            if ($salon['id'] == $validatedData['id']) {
                $salonKey = $key;
                break;
            }
        }

        // Verificar si el salon fue encontrada
        if ($salonKey === null) {
            \Log::error('Salon no encontrado con ID: ' . $validatedData['id']);
            return redirect()->back()->withErrors(['message' => 'Salón no encontrado']);
        }

        // Referencia a el salon específico encontrado
        $salonRef = $salonsRef->getChild($salonKey);

        // Actualizar los datos de la salon
        $updateData = [
            'nombre' => $validatedData['nombre'],
            'numero' => $validatedData['numero'],
            'piso' => $validatedData['piso'],
            'id_sede' => $validatedData['sede'],
            'info_salon/capacidad' => $validatedData['capacidad'],
            'info_salon/detalles' => $validatedData['detalles'],
            'info_salon/estado' => $validatedData['estado'],
        ];

        // Imprimir los datos a actualizar para depuración
        \Log::info('Datos a actualizar: ', $updateData);

        $salonRef->update($updateData);

        // Redireccionar con un mensaje de éxito
        return redirect()->route('Classrooms.edit', ['id' => $validatedData['id']])
            ->with('success', 'Salón actualizado correctamente');
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
        ]);

        // Obtener todas las salons
        $salonsRef = $this->database->getReference('salons');
        $salons = $salonsRef->getValue();

        // Encontrar el ID más alto y generar el siguiente ID
        $newId = 1; // Iniciar con 1 si no hay salons
        if ($salons) {
            $ids = array_keys($salons);
            $numericIds = array_filter($ids, 'is_numeric'); // Filtrar solo los IDs numéricos
            if (!empty($numericIds)) {
                $maxId = max($numericIds);
                $newId = $maxId + 1;
            }
        }

        // Guardar los datos de la nueva salon con el nuevo ID
        $salonsRef->getChild($newId)->set([
            'id' => $newId,
            'nombre' => $validatedData['nombre'],
            'direccion' => $validatedData['direccion'],
        ]);

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('salons.list')
            ->with('success', 'salon creada correctamente');
    }
}
