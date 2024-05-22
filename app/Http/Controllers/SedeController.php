<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Database;
use Yajra\DataTables\DataTables;

class SedeController extends Controller
{

    private $database;

    public function __construct()
    {
        $this->database = \App\Services\FirebaseService::connect();
    }

    public function index()
    {
        return view('admin.sedes.list');
    }

    public function new()
    {
        return view('admin.sedes.create');
    }

    public function jsonList()
    {
        $firebaseData = $this->database->getReference('Sedes')->getValue();
        $sedes = [];

        foreach ($firebaseData as $sede) {
            if ($sede != null) {
                $sedes[] = [
                    'id' => $sede['id'],
                    'direccion' => $sede['direccion'],
                    'nombre' => $sede['nombre'],
                ];
            }
        }


        return DataTables::of($sedes)
            ->addColumn('options', function ($sede) {
                return '<a class="btn btn-sm btn-outline-main" href="' . route('Sedes.edit', ['id' => $sede['id']]) . '"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                        <a class="btn btn-sm btn-outline-danger" href="javascript:deleteRow(' . $sede['id'] . ')"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>';
            })
            ->rawColumns(['options'])
            ->make();
    }

    public function edit($id)
    {
        $sedeRef = $this->database->getReference('Sedes')->getChild($id)->getValue();

        if ($sedeRef === null) {
            abort(404, 'Sede no encontrada');
        }

        $reg['reg'] = $sedeRef;

        return view('admin.sedes.edit', compact('reg'));
    }



    public function update(Request $request)
    {
        // Validar los datos del request
        $validatedData = $request->validate([
            'id' => 'required|integer',
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
        ]);

        // Obtener todas las sedes
        $sedesRef = $this->database->getReference('Sedes');
        $sedes = $sedesRef->getValue();

        // Buscar la sede por el atributo 'id'
        $sedeKey = null;
        foreach ($sedes as $key => $sede) {
            if ($sede['id'] == $validatedData['id']) {
                $sedeKey = $key;
                break;
            }
        }

        // Verificar si la sede fue encontrada
        if ($sedeKey === null) {
            \Log::error('Ítem no encontrado con ID: ' . $validatedData['id']);
            return redirect()->back()->withErrors(['message' => 'Ítem no encontrado']);
        }

        // Referencia a la sede específica encontrada
        $sedeRef = $sedesRef->getChild($sedeKey);

        // Actualizar los datos de la sede
        $updateData = [
            'nombre' => $validatedData['nombre'],
            'direccion' => $validatedData['direccion'],
        ];

        // Imprimir los datos a actualizar para depuración
        \Log::info('Datos a actualizar: ', $updateData);

        $sedeRef->update($updateData);

        // Redireccionar con un mensaje de éxito
        return redirect()->route('Sedes.edit', ['id' => $validatedData['id']])
            ->with('success', 'Sede actualizada correctamente');
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
        ]);

        // Obtener todas las sedes
        $sedesRef = $this->database->getReference('Sedes');
        $sedes = $sedesRef->getValue();

        // Encontrar el ID más alto y generar el siguiente ID
        $newId = 1; // Iniciar con 1 si no hay sedes
        if ($sedes) {
            $ids = array_keys($sedes);
            $numericIds = array_filter($ids, 'is_numeric'); // Filtrar solo los IDs numéricos
            if (!empty($numericIds)) {
                $maxId = max($numericIds);
                $newId = $maxId + 1;
            }
        }

        // Guardar los datos de la nueva sede con el nuevo ID
        $sedesRef->getChild($newId)->set([
            'id' => $newId,
            'nombre' => $validatedData['nombre'],
            'direccion' => $validatedData['direccion'],
        ]);

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('Sedes.list')
            ->with('success', 'Sede creada correctamente');
    }


}
