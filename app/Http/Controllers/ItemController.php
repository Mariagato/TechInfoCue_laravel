<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Database;
use Yajra\DataTables\DataTables;

class ItemController extends Controller
{
    private $database;

    public function __construct()
    {
        $this->database = \App\Services\FirebaseService::connect();
    }

    public function index()
    {
        return view('admin.items.list');
    }

    public function new()
    {
        return view('admin.items.create');
    }

    public function jsonList()
    {
        $firebaseData = $this->database->getReference('Items')->getValue();
        $items = [];

        foreach ($firebaseData as $item) {
            if ($item != null) {
                $items[] = [
                    'id' => $item['id'],
                    'nombre' => $item['nombre'],
                    'codigo' => $item['codigo'],
                    'estado' => $item['estado'],
                    'cantidad' => $item['info_item']['cantidad'],
                ];
            }
        }


        return DataTables::of($items)
            ->addColumn('options', function ($item) {
                return '<a class="btn btn-sm btn-outline-main" href="' . route('Items.edit', ['id' => $item['id']]) . '"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                        <a class="btn btn-sm btn-outline-danger" href="javascript:deleteRow(' . $item['id'] . ')"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>';
            })
            ->rawColumns(['options'])
            ->make();
    }

    public function edit($id)
    {
        $itemRef = $this->database->getReference('Items')->getChild($id)->getValue();

        if ($itemRef === null) {
            abort(404, 'Ítem no encontrado');
        }

        $proveedorId = $itemRef['proveedor_id'];
        $proveedorRef = $this->database->getReference('Proveedores')->getChild($proveedorId)->getValue();

        if ($proveedorRef === null) {
            $nombreProveedor = 'Proveedor no encontrado';
        } else {
            $nombreProveedor = $proveedorRef['nombre'];
        }

        // Obtener todos los proveedores
        $proveedores = $this->database->getReference('Proveedores')->getValue();
        $reg['reg'] = $itemRef;
        $reg['proveedor_id'] = $proveedorId; // Asegúrate de tener el ID del proveedor
        $reg['nombre_provedor'] = $nombreProveedor;

        return view('admin.items.edit', compact('reg', 'proveedores'));
    }



    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer',
            'codigo' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'serial' => 'nullable|string|max:255',
            'cantidad' => 'required|integer',
            'provedor' => 'nullable|string|max:255',
            'comentarios' => 'nullable|string',
            'descripcion' => 'nullable|string',
            'numero_factura' => 'nullable|string|max:255',
            'responsable' => 'nullable|string|max:255',
            'tiempo_uso' => 'nullable|string|max:255',
            'url' => 'nullable|string|max:255',
            'uso_sugerido' => 'nullable|string|max:255',
            'valor_factura' => 'nullable|numeric',
            'valor_mercado' => 'nullable|numeric',
        ]);

        // Obtener el ítem desde la base de datos
        $itemRef = $this->database->getReference('Items')->getChild($validatedData['id']);

        // Verificar si el ítem existe
        if ($itemRef->getValue() === null) {
            return redirect()->back()->withErrors(['message' => 'Ítem no encontrado']);
        }

        // Actualizar los datos del ítem
        $itemRef->update([
            'codigo' => $validatedData['codigo'],
            'nombre' => $validatedData['nombre'],
            'estado' => $validatedData['estado'],
            'serial' => $validatedData['serial'],
            'info_item/cantidad' => $validatedData['cantidad'],
            'info_item/comentarios' => $validatedData['comentarios'],
            'info_item/descripcion' => $validatedData['descripcion'],
            'info_item/numero_factura' => $validatedData['numero_factura'],
            'info_item/responsable' => $validatedData['responsable'],
            'info_item/tiempo_uso' => $validatedData['tiempo_uso'],
            'info_item/url' => $validatedData['url'],
            'info_item/uso_sugerido' => $validatedData['uso_sugerido'],
            'info_item/valor_factura' => $validatedData['valor_factura'],
            'info_item/valor_mercado' => $validatedData['valor_mercado'],
        ]);

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('Items.edit', ['id' => $validatedData['id']])
            ->with('success', 'Ítem actualizado correctamente');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'codigo' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'serial' => 'nullable|string|max:255',
            'cantidad' => 'required|integer',
            'provedor' => 'nullable|string|max:255',
            'comentarios' => 'nullable|string',
            'descripcion' => 'nullable|string',
            'numero_factura' => 'nullable|string|max:255',
            'responsable' => 'nullable|string|max:255',
            'tiempo_uso' => 'nullable|string|max:255',
            'url' => 'nullable|string|max:255',
            'uso_sugerido' => 'nullable|string|max:255',
            'valor_factura' => 'nullable|numeric',
            'valor_mercado' => 'nullable|numeric',
        ]);

        // Obtener todos los ítems
        $itemsRef = $this->database->getReference('Items');
        $items = $itemsRef->getValue();

        // Encontrar el ID más alto y generar el siguiente ID
        $newId = 1; // Iniciar con 1 si no hay ítems
        if ($items) {
            $ids = array_keys($items);
            $numericIds = array_filter($ids, 'is_numeric'); // Filtrar solo los IDs numéricos
            if (!empty($numericIds)) {
                $maxId = max($numericIds);
                $newId = $maxId + 1;
            }
        }

        // Guardar los datos del nuevo ítem con el nuevo ID
        $itemsRef->getChild($newId)->set([
            'id' => $newId,
            'codigo' => $validatedData['codigo'],
            'nombre' => $validatedData['nombre'],
            'estado' => $validatedData['estado'],
            'serial' => $validatedData['serial'],
            'info_item' => [
                'cantidad' => $validatedData['cantidad'],
                'comentarios' => $validatedData['comentarios'],
                'descripcion' => $validatedData['descripcion'],
                'numero_factura' => $validatedData['numero_factura'],
                'responsable' => $validatedData['responsable'],
                'tiempo_uso' => $validatedData['tiempo_uso'],
                'url' => $validatedData['url'],
                'uso_sugerido' => $validatedData['uso_sugerido'],
                'valor_factura' => $validatedData['valor_factura'],
                'valor_mercado' => $validatedData['valor_mercado'],
            ],
            'proveedor_id' => $validatedData['provedor'] ?? null, // Asignar proveedor_id si existe
        ]);

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('Items.list')
            ->with('success', 'Ítem creado correctamente');
    }



}
