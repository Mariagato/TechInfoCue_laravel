<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $fillable = ['id', 'name'];

    /**
     * Obtiene las imágenes del slide.
     * @return \Illuminate\Support\Collection
     * Created by <Rhiss.net>
     */
    public static function getImages($id)
    {
        return SlideImage::where('slide_id', $id)->with('info')->orderBy('position')->get();
    }
}
