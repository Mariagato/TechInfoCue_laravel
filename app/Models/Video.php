<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded = ['id'];

    /**
     * Info del video.
     * @return mixed
     * Created by  <Rhiss.net>
     */
    public function info()
    {
        return $this->hasOne(InfoVideo::class)->where('lang', \Lang::locale());
    }

    /**
     * Obtiene todos los vídeos dado el id de la galería de vídeos.
     *
     * @param $id
     *
     * @return mixed
     * Created by  <Rhiss.net>
     */
    public static function getVideos($id)
    {
        return self::where('gallery_id', $id)->orderBy('position')->get();
    }
}
