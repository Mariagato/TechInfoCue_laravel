<?php

if ( ! function_exists('format_date')) {

    function format_date($date, $months = "")
    {
        if ($date != "") {
            $months = array(
                "",
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Septiembre",
                "Octubre",
                "Noviembre",
                "Diciembre"
            );
            if (strpos($date, " ")) {
                $time = explode(" ", $date);
                $date = $time[0];
            }

            $dat   = explode("-", $date);
            $month = (int)$dat[1];
            $day   = $dat[2];
            $year  = $dat[0];

            return $months[$month] . " " . $day . " de " . $year;
        }

        return '';
    }
}


if ( ! function_exists('format_date_time')) {

    function format_date_time($date, $months = "")
    {
        if ($date != "") {
            $months = array(
                "",
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Septiembre",
                "Octubre",
                "Noviembre",
                "Diciembre"
            );
            if (strpos($date, " ")) {
                $time = explode(" ", $date);
                $date = $time[0];
            }

            $dat   = explode("-", $date);
            $month = (int)$dat[1];
            $day   = $dat[2];
            $year  = $dat[0];

            return $months[$month] . " " . $day . " de " . $year . (isset($time[1]) ? ' ' . $time[1] : '');
        }

        return '';
    }
}


if ( ! function_exists('format_hour')) {
    function format_hour($hour)
    {
        return Date('g:i a', strtotime($hour));
    }
}

if ( ! function_exists('get_info')) {

    function get_info($name)
    {
        return \App\Models\Configsite::getInfo($name);
    }
}


if ( ! function_exists('format_url')) {

    function format_url($url)
    {
        if ($url != "") {
            return '//' . preg_replace('#^https?://#', '', $url);
        } else {
            return '#';
        }
    }
}

if ( ! function_exists('chstr')) {
    function chstr($str)
    {
        $code  = array('á', 'é', 'í', 'ó', 'ú', 'ñ', 'Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ');
        $code2 = array('a', 'e', 'i', 'o', 'u', 'n', 'A', 'E', 'I', 'O', 'U', 'N');
        $str   = str_replace($code, $code2, $str);

        $search  = '-';
        $replace = '-';

        $trans = array(
            $search                     => $replace,
            "\s+"                       => $replace,
            "[^a-z0-9" . $replace . "]" => '',
            $replace . "+"              => $replace,
            $replace . "$"              => '',
            "^" . $replace              => ''
        );

        $str = strip_tags(strtolower($str));

        foreach ($trans as $key => $val) {
            $str = preg_replace("#" . $key . "#", $val, $str);
        }

        return trim(stripslashes($str));
    }
}

if ( ! function_exists('current_option')) {
    function current_option($current, $option)
    {
        return isset($current) && $current == $option ? 'current_option' : '';
    }
}

if ( ! function_exists('price_format')) {
    function price_format($var, $default = "")
    {
        return isset($var) ? "$" . number_format($var, 0, ',', '.') : $default;
    }
}

if ( ! function_exists('min_title')) {
    function min_title($title)
    {
        return strlen($title) > 32 ? substr($title, 0, 32) . '...' : $title;
    }
}

if ( ! function_exists('ip_address')) {
    function ip_address()
    {
        if ( ! empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif ( ! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }
}


if ( ! function_exists('generate_select')) {
    function generate_select($name, $list, $default = 0, $options = [])
    {
        $html = '<select name="' . $name . '" class="form-control ' . ($options['class'] ?? '') . '" required id="' . ($options['id'] ?? '') . '">';
        $html .= '<option value="" ' . ($default == 0 ? 'selected' : '') . '>' . ($options['placeholder'] ?? 'Seleccione') . '</option>';
        foreach ($list as $key => $item) {
            $html .= '<option value="' . $key . '" ' . ($default == $key ? 'selected' : '') . '>' . $item . '</option>';
        }
        $html .= '</select>';

        return $html;
    }
}
if ( ! function_exists('generate_list')) {
    function generate_list($list, $type)
    {
        $html = '';
        foreach ($list as $item) {
            $html .= '<br><a href="' . route($type, ['id' => $item]) . '" target="_blank">' . $item . '</a>';
        }

        return $html;
    }
}

if ( ! function_exists('prod_path')) {
    function prod_path($name)
    {
        return '/home/xxx/public_html/' . $name; // TODO cambiar xxx para producción
    }
}

if ( ! function_exists('check_item_active')) {
    function check_item_active($type, $seg1, $seg2 = '', $exclude_new = 1)
    {
        $menu = explode(',', $seg1);
        if (in_array(request()->segment(2), $menu)) {
            $class = '';
            switch ($type) {
                case 'main_li':
                    $class = 'active current';
                    break;
                case 'main_li_id':
                    $segs  = explode(',', $seg2);
                    $seg3  = is_null(request()->segment(4)) || request()->segment(4) > 0 && $exclude_new || ! $exclude_new;
                    $class = in_array(request()->segment(4), $segs) && $seg3 ? 'active current' : '';
                    break;
                case 'inner_li_add':
                    $segs  = explode(',', $seg2);
                    $class = (in_array(request()->segment(3), $segs) && empty(request()->segment(4))) ? 'active current' : '';
                    break;
                case 'inner_li':
                    $segs  = explode(',', $seg2);
                    $class = (in_array(request()->segment(3), $segs) && empty(request()->segment(4))) ? 'active current' : '';
                    break;
                case 'inner_li_list':
                    $segs  = explode(',', $seg2);
                    $class =  (in_array(request()->segment(3),$segs) && (is_null(request()->segment(4)) || request()->segment(4) != '0')) ? 'active current' : '';
                    break;
            }

            return $class;
        } else {
            return '';
        }
    }
}
