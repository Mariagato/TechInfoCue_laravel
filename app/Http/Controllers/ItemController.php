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

    public function getEstadoItem($item)
{
    $itemEstado = '';

    if (isset($item['Activo']) && $item['Activo'] == "1 Activo") {
        $itemEstado = "Activo";
    } elseif (isset($item['De baja']) && $item['De baja'] == "1 No Activo") {
        $itemEstado = "No Activo";
    } elseif (isset($item['Inactivo']) && $item['Inactivo'] == "1 Inactivo") {
        $itemEstado = "Inactivo";
    } else {
        $itemEstado = "No se registra estado";
    }

    return $itemEstado;
}

public function jsonList()
{
    $firebaseData = $this->database->getReference('Items')->getValue();
    $items = [];

    foreach ($firebaseData as $index => $item) {
        if ($item != null) {
            $items[] = [
                'id' => $index,
                'nombre' => $item["NOMBRE "] ?? 'N/A', // Usa 'NOMBRE' sin el espacio final y un valor por defecto si no existe
                'codigo' => $item['SERIAL'] ?? 'N/A', // Usa un valor por defecto si no existe
                'estado' => $this->getEstadoItem($item),
                'cantidad' => $item['CANTIDAD'] ?? 0, // Usa un valor por defecto si no existe
            ];
        }
    }

    usort($items, function ($a, $b) {
        return $a['id'] <=> $b['id'];
    });

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

    $reg['reg'] = $itemRef;
    $reg['id'] = $id;


    return view('admin.items.edit', compact('reg'));
}




    public function update(Request $request)
{
    $validatedData = $request->validate([
        'id' => 'required|string|max:255', // Ajustado a string porque el ID_INVENTARIO puede no ser un número
        'codigo' => 'required|string|max:255',
        'nombre' => 'required|string|max:255',
        'estado' => 'required|string|max:255',
        'serial' => 'nullable|string|max:255',
        'cantidad' => 'required|integer',
        'proveedor' => 'nullable|string|max:255',
        'comentarios' => 'nullable|string',
        'descripcion_general' => 'nullable|string',
        'fecha_de_compra' => 'nullable|date',
        'ubicacion' => 'nullable|string|max:255',
        'responsable' => 'nullable|string|max:255',
        'uso_sugerido' => 'nullable|integer',
        'imagen_url' => 'nullable|string|max:255',
    ]);

    // Obtener el ítem desde la base de datos
    $itemRef = $this->database->getReference('Items')->getChild($validatedData['id']);

    // Verificar si el ítem existe
    if ($itemRef->getValue() === null) {
        return redirect()->back()->withErrors(['message' => 'Ítem no encontrado']);
    }

    // Procesar imagen si se ha subido una
    if ($request->hasFile('image')) {
        $archivo = $request->file('image');
        $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
        $rutaArchivo = public_path('/upload') . '/' . $nombreArchivo;
        $archivo->move(public_path('/upload'), $nombreArchivo);
        $itemRef->update([
            'Imagen' => $nombreArchivo,
        ]);
    }

    // Actualizar los datos del ítem
    $itemRef->update([
        'ID_INVENTARIO' => $validatedData['codigo'],
        'NOMBRE ' => $validatedData['nombre'],
        'Activo' => ($validatedData['estado'] == '1 Activo') ? '1 Activo' : '0 No Activo',
        'Inactivo' => ($validatedData['estado'] == '1 Inactivo') ? '1 Inactivo' : '0 No Activo',
        'De baja' => ($validatedData['estado'] == '1 No Activo') ? '1 No Activo' : '0 No Activo',
        'SERIAL' => $validatedData['serial'],
        'CANTIDAD' => $validatedData['cantidad'],
        'PROVEEDOR' => $validatedData['proveedor'],
        'DESCRIPCIÓN GENERAL' => $validatedData['descripcion_general'],
        'FECHA DE COMPRA' => $validatedData['fecha_de_compra'],
        'UBICACIÓN' => $validatedData['ubicacion'],
        'RESPONSABLE' => $validatedData['responsable'],
        'USO_SUGERIDO' => $validatedData['uso_sugerido'],
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
            'image' => $nombreArchivo,
            'proveedor_id' => $validatedData['provedor'] ?? null, // Asignar proveedor_id si existe
        ]);

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('Items.list')
            ->with('success', 'Ítem creado correctamente');
    }

    public function addIdToUsersCollection($tabla)
{
    set_time_limit(0);

    // Obtenemos una referencia a la colección "Users"
    $usersRef = $this->database->getReference($tabla);

    // Obtenemos todos los usuarios
    $users = $usersRef->getValue();

    // Iteramos sobre cada usuario y le agregamos el atributo "id"
    foreach ($users as $userId => $userData) {
        if ($userId > 8999) { // Verificamos si el ID es mayor a 8999
            $userData['id'] = $userId; // Agregamos el ID como un atributo en los datos

            // Actualizamos el usuario con los nuevos datos
            $usersRef->getChild($userId)->set($userData);
        }
    }

    return 'IDs agregados correctamente a la colección Users para usuarios con ID mayor a 8999.';
}




}
