<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Cambia el lenguaje de la aplicación.
     *
     * @param $lang
     *
     * @return \Illuminate\Http\RedirectResponse
     * Created by  <Rhiss.net>
     */
    public function switchLang($lang)
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
        }

        return back();
    }
}