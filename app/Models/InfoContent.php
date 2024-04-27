<?php

namespace App\Models;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class InfoContent extends Model
{
    use Translatable;

    protected $guarded = ['id'];
    protected $foregeinKey = 'content_id';

    /**
     * Contenido asociado a la info.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * Created by  <Rhiss.net>
     */
    public function content()
    {
        return $this->belongsTo(Content::class);
    }
}
