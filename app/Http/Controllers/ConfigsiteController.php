<?php

namespace App\Http\Controllers;

use App\Models\Configsite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class ConfigsiteController extends Controller
{

    private $config;

    /**
     * ConfigsiteController constructor.
     *
     * @param Configsite $config
     */
    public function __construct(Configsite $config)
    {
        $this->config = $config;
    }

    /**
     * Muestra el formulario para editar la configuración del sitio web.
     * Created by  <Rhiss.net>
     */
    public function edit()
    {
        $reg['info']    = $this->config->where(['lang' => Lang::locale()])->pluck('value', 'name')->toArray();
        $reg['message'] = session('message');

        return view('admin.configsite', $reg);
    }


    /**
     * Actualiza la configuración del sitio web.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * Created by <Rhiss.net>
     */
    public function update(Request $request)
    {
        $data = $request->info;
        //====================== images
        $images = ['banner' => ['s' => [400, 370]], 'icon' => ['s' => [50, 50]]];
        foreach ($images as $key => $sizes) {
            if ($request->file($key)) {
                $data[$key] = $this->config->uploadImage($request->file($key), $sizes, 70);
            }
            if ($request->get('delimg_' . $key)) {
                $sizes      = ['s'];
                $data[$key] = $this->config->deleteImage(get_info($key), $sizes);
            }
        }
        //=============================

        $exclude = [
            'template_color',
            'analytics',
            'facebook',
            'twitter',
            'instagram',
            'youtube'
        ];

        foreach ($data as $key => $value) {
            if ($this->config->where(['name' => $key, 'lang' => Lang::locale()])->count() > 0) {
                $this->config->where(['name' => $key])->when(! in_array($key, $exclude), function ($query) {
                    return $query->where('lang', Lang::locale());
                })->update(['value' => $value]);
            } else {
                $this->config->create(['name' => $key, 'value' => $value, 'lang' => Lang::locale()]);
                $langs = config('app.other_locales');
                foreach ($langs as $lang) {
                    if ($lang != Lang::locale()) {
                        $this->config->create(['name' => $key, 'value' => $value, 'lang' => $lang]);
                    }
                }
            }
        }

        session()->flash('message', 'Información guardada.');

        return redirect()->route('configsite.edit');
    }
}
