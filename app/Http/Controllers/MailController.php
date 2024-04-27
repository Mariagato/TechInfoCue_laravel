<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContact;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Envia un mensaje al suscriptor.
     *
     * @param $data
     * Created by  <Rhiss.net>
     */
    public static function mailSubscribe($data)
    {
        Mail::send('email.subscribe', $data, function ($message) use ($data) {
            $admin = User::find(1)->name;
            $message->subject('Gracias por tu suscripción a' . get_info('title_meta'));
            $message->from(get_info('email'), $admin);
            $message->to($data['email']);
        });
    }

    /**
     * Envía un mensaje al administrador del sitio cuando un usuario diligencia un formulario de contactenos.
     *
     * @param StoreContact $request
     *
     * @return mixed Created by  <Rhiss.net>
     * Created by  <Rhiss.net>
     */
    public function mailContact(StoreContact $request)
    {
        $data = $request->all();

        Mail::send('email.contact', $data, function ($message) use ($data) {
            $message->subject('Nuevo contacto desde ' . get_info('title_meta'));
            $message->from($data['email'], $data['name']);
            $message->to(get_info('email'));
        });
        Mail::send('email.confirm', $data, function ($message) use ($data) {
            $admin = User::find(1)->name;
            $message->subject('Confirmación de contacto desde ' . get_info('title_meta'));
            $message->from(get_info('email'), $admin);
            $message->to($data['email']);
        });

        session()->flash('message_contact',
            'Gracias por escribirnos, pronto uno de nuestros representantes se comunicará contigo.');

        return redirect()->back();
    }
}

