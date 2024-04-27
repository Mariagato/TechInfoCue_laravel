<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelRol extends Model
{
    protected $guarded = ['id'];
    protected $table = 'model_has_roles';
}