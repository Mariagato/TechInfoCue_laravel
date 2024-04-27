<?php

namespace App\Models;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class InfoVideo extends Model
{
    use Translatable;

    protected $guarded = ['id'];
    protected $foregeinKey = 'video_id';
}
