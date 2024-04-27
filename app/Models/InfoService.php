<?php

namespace App\Models;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class InfoService extends Model
{
    use Translatable;

    protected $guarded = ['id'];
    protected $foregeinKey = 'service_id';

    /**
     * Servicio asociado a la info.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * Created by  <Rhiss.net>
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
