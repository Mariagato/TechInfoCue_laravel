<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoCustomGallery extends Model
{
    protected $guarded = ['id'];

    /**
     * Galería asociado a la info.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * Created by  <Rhiss.net>
     */
    public function gallery()
    {
        return $this->belongsTo(CustomGallery::class);
    }
}
