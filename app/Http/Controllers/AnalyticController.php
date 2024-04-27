<?php

namespace App\Http\Controllers;

use App\Models\Analytic;
use Illuminate\Http\Request;

class AnalyticController extends Controller
{
    private $ga;
    private $gacode;

    public function __construct()
    {
        $ga = get_info('analytics');

        if ( ! empty($ga)) {
            $this->gacode = $ga;
        }

        $this->ga = new Analytic();

    }

    public function validateAccount()
    {
        if (empty($this->gacode)) {
            return false;
        } else {
            return true;
        }
    }

    public function visits(Request $request)
    {
        $this->ga->setProfileById($this->gacode);

        $date_start = $request->get('date_start');
        $date_end   = $request->get('date_end');

        $this->ga->setDateRange($date_start, $date_end);
        $visitas = $this->ga->getVisitors();

        $json = array();

        foreach ($visitas['rows'] as $value) {
            $json['data'][] = intval($value[2]);
        }

        $json['name'] = 'Visitas';

        return response()->json($json);
    }

    public function general(Request $request)
    {
        $this->ga->setProfileById($this->gacode);

        $date_start = $request->get('date_start');
        $date_end   = $request->get('date_end');

        $this->ga->setDateRange($date_start, $date_end);

        $d['rebound'] = $this->ga->getBounceRate();
        $d['visits']  = $this->ga->getTotalVisits();
        $d['time']    = $this->ga->getTimePage();

        return response()->json($d);
    }

    public function graph(Request $request)
    {
        $this->ga->setProfileById($this->gacode);
        $tipo       = $request->get('type');
        $date_start = $request->get('date_start');
        $date_end   = $request->get('date_end');
        $this->ga->setDateRange($date_start, $date_end);
        $aData = [];

        if ($tipo == 1) {
            $aData = $this->ga->getReferrers();
            echo '<table class="table table-hover table-bordered">
                    <thead>
                        <th>Sitio Web</th>
                        <th style="text-align:center" width="10">Visitas</th>
                    </tr>
                    <tbody>';

        } elseif ($tipo == 2) {
            $aData = $this->ga->getCountry();
            echo '<table class="table table-hover table-bordered">
                     <thead>
                        <th>País</th>
                        <th style="text-align:center" width="10">Visitas</th>
                    </thead>
                    <tbody>';
        }

        $iMax = (count($aData['rows']) > 0) ? max($aData['rows']) : 0;

        if ($iMax == 0) {
            echo '</tbody></table>';

            return;
        }

        $datos = $aData['rows'];
        asort($datos);
        $i = 0;

        foreach ($datos as $sValue) {
            echo '  <tr>
						<td>' . $sValue[0] . '</td>
						<td align="center">' . $sValue[1] . '</td>
					</tr>';

            if ($i++ > 20) {
                break;
            }
        }
        echo '</table>';
    }
}
