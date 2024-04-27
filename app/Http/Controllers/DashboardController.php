<?php

namespace App\Http\Controllers;

use Spatie\Sitemap\SitemapGenerator;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $controller = new AnalyticController();
        if ($controller->validateAccount()) {
            $reg['installed']  = true;
            $reg['date_start'] = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d") - 30, date("Y")));
            $reg['date_end']   = date('Y-m-d');

        } else {
            $reg['installed'] = false;
        }

        return view('admin.dashboard', $reg);
    }
}
