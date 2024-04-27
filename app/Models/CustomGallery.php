<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomGallery extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];

    /**
     * Info de la galería.
     * @return mixed
     * Created by  <Rhiss.net>
     */
    public function info()
    {
        return $this->hasOne(InfoCustomGallery::class)->where('lang', \Lang::locale());
    }

    /**
     * Imágenes de la galería (si type:images).
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     * Created by  <Rhiss.net>
     */
    public function images()
    {
        return $this->hasManyThrough(GalleryImage::class, Gallery::class, 'id', 'gallery_id',
            'gallery_id')->with('info');
    }

    /**
     * Vídeos de la galería (si type:videos).
     * @return mixed
     * Created by  <Rhiss.net>
     */
    public function videos()
    {
        return $this->hasManyThrough(InfoVideo::class, Video::class, 'id', 'video_id',
            'video_gallery_id')->orderBy('position');
    }
}
