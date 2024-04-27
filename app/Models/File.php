<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $guarded = ['id'];

    /**
     * Info del archivo.
     * @return mixed
     * Created by  <Rhiss.net>
     */
    public function info()
    {
        return $this->hasOne(InfoFile::class)->where('lang', \Lang::locale());
    }

    /**
     * Obtiene todos los archivos dado el id de la galería de archivos.
     *
     * @param $id
     *
     * @return mixed
     * Created by  <Rhiss.net>
     */
    public static function getFiles($id)
    {
        return self::where('gallery_id', $id)->orderBy('position')->get();
    }
}
