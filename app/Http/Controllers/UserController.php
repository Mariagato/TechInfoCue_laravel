<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\InfoUser;
use App\Models\ModelRol;
use App\Models\Rol;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    private $user;

    private $rol;
    private $infoUser;

    private $modelRol;

    public function __construct(User $user, InfoUser $infoUser, Rol $rol, ModelRol $modelRol)
    {
        $this->user = $user;
        $this->infoUser = $infoUser;
        $this->rol = $rol;
        $this->modelRol = $modelRol;
    }

    /**
     * Undocumented function
     * 
     */
    public function users()
    {
        return view('admin.user.list');
    }

    /**
     * Undocumented function
     * 
     * @param int $id
     */
    public function editUser($id = 0)
    {
        $reg['option'] = 'Agregar';
        $rol = $this->rol->all()->pluck('name', 'id');
        $reg['roles'] = $rol;
        $reg['message'] = session('message');

        if ($id > 0) {
            $reg['reg'] = $this->user->find($id);
            $reg['option'] = 'Editar';
            $reg['rol_id'] = $this->modelRol->where('model_id', $id)->first()->role_id;
        }

        return view('admin.user.edit', $reg);
    }

    /**
     * Undocumented function
     * 
     * @param Illuminte\Http\Request
     * @param int $id
     */
    public function updateOrCreateUser(Request $request, $id = 0)
    {
        $dat = $request->dat;
        $info = $request->info;

        if ($id > 0) {
            $user = User::find($id);
            $user->update($dat);
            $user->update($info);
        } else {
            $user = User::create($dat);
            $info['user_id'] = $user->id;
            infoUser::create($info);
        }

        $rolName = $this->rol->where('id', $dat['rol_id'])->first()->name;

        $user->assignRole($rolName);
        session()->flash('message', 'Información guardada.');

        return redirect()->route('users.edit', $user->id);
    }

    /**
     * Json
     * 
     */
    public function jsonListUsers()
    {
        $users = User::datatable();

        return DataTables::of($users)->editColumn('options', function ($user) {
            return '
                <a class="btn btn-outline-main btn-sm" href="' . route('users.edit', $user->id) . '"><i class="fa fa-pencil"></i> Editar</a>
                <a class="btn btn-outline-danger btn-sm" href="javascript:deleteRow(' . $user->id . ')"><i class="fa fa-trash"></i> Eliminar</a>
            ';
        })->rawColumns(['options'])->make(true);
    }
}