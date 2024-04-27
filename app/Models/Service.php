<?php

namespace App\Models;

use App\Traits\Storable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;
    use Storable;

    protected $guarded = ['id'];
    protected $path = 'service';

    /**
     * Info del servicio internacional.
     * @return mixed
     * Created by  <Rhiss.net>
     */
    public function info()
    {
        return $this->hasOne(InfoService::class)->where('lang', \Lang::locale());
    }

    /**
     * Categoría del servicio.
     * @return mixed
     * Created by  <Rhiss.net>
     */
    public function category()
    {
        return $this->belongsTo(InfoCategory::class, 'category_id', 'category_id')->where('lang', \Lang::locale());
    }


    /**
     * Galería de imágenes.
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     * Created by  <Rhiss.net>
     */
    public function gallery()
    {
        return $this->hasManyThrough(GalleryImage::class, Gallery::class, 'id', 'gallery_id', 'gallery_id');
    }

    /**
     * Consulta para mostrar listado con datatables.
     *
     * @param $query
     *
     * @return mixed
     * Created by <Rhiss.net>
     */
    public function scopeDatatable($query)
    {
        return $query->join('info_services', 'info_services.service_id', '=', 'services.id')
                     ->leftJoin('info_categories', 'info_categories.category_id', '=', 'services.category_id')
                     ->where([
                         'info_services.lang'   => \Lang::locale(),
                         'info_categories.lang' => \Lang::locale()
                     ])
                     ->select([
                         'services.id',
                         'info_services.title as info_services.title',
                         'info_categories.name as info_categories.name'
                     ]);

    }
}
