<?php

namespace App\Models;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class InfoSlideImage extends Model
{
    use Translatable;

    protected $guarded = ['id'];
    protected $foregeinKey = 'slide_image_id';
}
