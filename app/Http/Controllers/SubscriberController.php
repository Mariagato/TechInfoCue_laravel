<?php

namespace App\Http\Controllers;

use App\Exports\SubscriberExport;
use App\Models\Subscriber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class SubscriberController extends Controller
{
    private $subscriber;

    /**
     * SubscriberController constructor.
     *
     * @param Subscriber $subscriber
     */
    public function __construct(Subscriber $subscriber)
    {
        $this->subscriber = $subscriber;

    }

    /**
     * Muestra la lista de suscriptores en el CMS.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Created by  <Rhiss.net>
     */
    public function index()
    {
        $reg['from']  = new Carbon($this->subscriber->min('created_at'));
        $reg['from']  = $reg['from']->toDateString();
        $reg['until'] = date('Y-m-d');

        return view('admin.subscribers', $reg);
    }


    /**
     * Lista los suscriptores en formato JSON para mostrar con Datatable.
     * @return mixed
     * @throws \Exception
     * Created by <Rhiss.net>
     */
    public function jsonList()
    {
        $subscribers = $this->subscriber->select(['id', 'name', 'email', 'created_at']);

        return DataTables::of($subscribers)
                         ->addColumn('options', function ($subscriber) {
                             return '<a class="btn btn-outline-danger" href="javascript:deleteRow(' . $subscriber->id . ')"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>';
                         })
                         ->editColumn('created_at', function ($subscriber) {
                             return $subscriber->created_at->format('d-m-Y h:i:s A');
                         })
                         ->rawColumns(['options'])
                         ->make();
    }

    /**
     * Elimina la información de un suscriptor de la bd.
     *
     * @param $id
     * Created by  <Rhiss.net>
     */
    public function delete($id)
    {
        echo $this->subscriber->find($id)->delete();
    }

    /**
     * Verifica que el email que se va a suscribir no exista.
     *
     * @param $email
     *
     * @return \Illuminate\Http\JsonResponse
     * Created by  <Rhiss.net>
     */
    public function verify($email)
    {
        if ($this->subscriber->where('email', $email)->count() > 0) {
            return response()->json([
                'response' => true,
                'message'  => 'Este email ya se encuentra suscrito a nuestro boletín.'
            ]);
        } else {
            return response()->json(['response' => false, 'message' => '']);
        }
    }

    /**
     * Verifica que el email que se va a suscribir no exista y retorna una valor boolean.
     *
     * @param $email
     *
     * @return bool
     * Created by  <Rhiss.net>
     */
    public static function verifyBoolean($email)
    {
        if (Subscriber::where('email', $email)->count() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Suscribe un usuario desde otro formulario.
     *
     * @param $dat
     * Created by <Rhiss.net>
     */
    public static function subSubscribe($dat)
    {
        if (SubscriberController::verifyBoolean($dat['email']) == false) {
            Subscriber::create($dat);
        }
    }


    /**
     * Suscribe un usuario al boletín.
     * Created by  <Rhiss.net>
     */
    public function subscribe(Request $request)
    {

        $rules = array(
            'my_name' => 'honeypot',
            'my_time' => 'required|honeytime:5'
        );

        $validator = Validator::make($_POST, $rules);

        if ( ! $validator->fails()) {
            if (SubscriberController::verifyBoolean($request->email) == false) {
                $subscriber    = $this->subscriber->create($request->all());
                $data['msg']   = 'Gracias por tu suscripción a nuestro boletín';
                $data['name']  = $subscriber->name;
                $data['email'] = $subscriber->email;
                $data['key']   = $subscriber->key;
                $data['id']    = $subscriber->id;

                MailController::mailSubscribe($data);

                session()->flash('general_message', 'Gracias por suscribirte a nuestro boletín.');

                return redirect()->to(app('url')->previous());

            } else {
                session()->flash('general_error_message', 'Este email ya se encuentra suscrito a nuestro boletín.');

                return redirect()->to(app('url')->previous());
            }
        }

        return redirect()->back();
    }

    /**
     * Cancela una suscripción (desde el email).
     *
     * @param $key
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     * Created by  <Rhiss.net>
     */
    public function cancel($key, $id)
    {
        $subscriber = $this->subscriber->find($id);

        if ($subscriber != null && md5($subscriber->key) == $key) {
            $subscriber->delete();
            session()->flash('message_cancel_success', 'Tu email se ha eliminado de nuestra lista de suscriptores.');
        } else {
            session()->flash('message_cancel_error',
                'El token de seguridad es inválido o este usuario ya fue eliminado de nuestra lista de suscriptores.');
        }

        return redirect()->route('home');
    }

    /**
     * Exporta los suscriptores en formato xlsx.
     * Created by  <Rhiss.net>
     */
    public function export(Request $request)
    {
        $from  = $request->from;
        $until = $request->until;

        $name = 'newsletter';

        return Excel::download(new SubscriberExport($from, $until), $name . '.xlsx');

    }
}
