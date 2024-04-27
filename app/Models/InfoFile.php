<?php

namespace App\Models;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class InfoFile extends Model
{
    use Translatable;

    protected $guarded = ['id'];
    protected $foregeinKey = 'file_id';
}
