<?php

namespace App\Models;

use App\Traits\Storable;
use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    use Storable;

    protected $guarded = ['id'];
    protected $path = 'gallery';

    /**
     * Obtiene todas las imágenes dado el id de la galería de imágenes.
     *
     * @param $id
     *
     * @return mixed
     * Created by  <Rhiss.net>
     */
    public static function getGallery($id)
    {
        return self::where('gallery_id', $id)->orderBy('position')->get();
    }

    /**
     * Info de la imagen.
     * @return mixed
     * Created by  <Rhiss.net>
     */
    public function info()
    {
        return $this->hasOne(InfoGalleryImage::class)->where('lang', \Lang::locale());
    }
}
