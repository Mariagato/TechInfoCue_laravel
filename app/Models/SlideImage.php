<?php

namespace App\Models;

use App\Traits\Storable;
use Illuminate\Database\Eloquent\Model;

class SlideImage extends Model
{
    use Storable;

    protected $guarded = ['id'];
    protected $path = 'slide';

    /**
     * Info de la imagen.
     * @return mixed
     * Created by  <Rhiss.net>
     */
    public function info()
    {
        return $this->hasOne(InfoSlideImage::class)->where('lang', \Lang::locale());
    }
}
