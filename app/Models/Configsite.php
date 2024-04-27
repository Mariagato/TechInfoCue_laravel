<?php

namespace App\Models;

use App\Traits\Storable;
use Illuminate\Database\Eloquent\Model;

class Configsite extends Model
{
    use Storable;
    protected $guarded = ['id'];
    protected $path = 'configsite';

    /**
     * Info de la configuración.
     *
     * @param string $key
     *
     * @return string
     * Created by  <Rhiss.net>
     */
    public static function getInfo($key = '')
    {
        $config = self::where(['name' => $key, 'lang' => \Lang::locale()])->first();

        return $config != '' ? $config->value : '';
    }
}
