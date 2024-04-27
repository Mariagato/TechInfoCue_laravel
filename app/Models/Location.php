<?php

namespace App\Models;

use App\Traits\storable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes;
    use Storable;

    protected $guarded = ['id'];
    protected $path = 'location';
}
