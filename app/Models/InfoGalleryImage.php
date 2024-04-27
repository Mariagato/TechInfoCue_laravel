<?php

namespace App\Models;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class InfoGalleryImage extends Model
{
    use Translatable;

    protected $guarded = ['id'];
    protected $foregeinKey = 'gallery_image_id';

}
