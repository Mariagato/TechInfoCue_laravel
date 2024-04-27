<?php

namespace App\Http\Controllers;

use App\Rules\CurrentPassword;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Muestra el formulario para editar los datos de la cuenta en el CMS.
     * Created by  <Rhiss.net>
     */
    public function edit()
    {
        $reg['reg']     = auth()->user();
        $reg['message'] = session('status') ? session('status') : session('message');

        return view('admin.account.edit', $reg);
    }

    /**
     * Actualiza la información de un usuario.
     * @return \Illuminate\Http\RedirectResponse
     * Created by  <Rhiss.net>
     */
    public function update(Request $request)
    {
        $request->validate([
            'email'                 => 'required|email|max:255|unique:users,email,' . auth()->user()->id,
            'current_password'      => ['sometimes','nullable', new CurrentPassword()],
            'password'              => 'sometimes|nullable|same:password',
            'password_confirmation' => 'sometimes|nullable|same:password',
        ]);

        $data = $request->all();
        if ( ! empty($request->get('password'))) {
            $data['password'] = bcrypt($request->get('password'));
        }
        $user = auth()->user();
        $user->update($data);
        session()->flash('message', 'Información guardada.');

        return redirect()->route('account.edit');
    }
}
