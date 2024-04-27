<?php

namespace App\Models;

use App\Traits\Storable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use SoftDeletes;
    use Storable;

    protected $guarded = ['id'];
    protected $path = 'content';

    /**
     * Info del contenido.
     * @return mixed
     * Created by  <Rhiss.net>
     */
    public function info()
    {
        return $this->hasOne(InfoContent::class)->where('lang', \Lang::locale());
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
        return $query->join('info_contents', 'info_contents.content_id', '=', 'contents.id')
                     ->leftJoin('info_categories', 'info_categories.category_id', '=', 'contents.category_id')
                     ->where([
                         'info_contents.lang'   => \Lang::locale(),
                         'info_categories.lang' => \Lang::locale()
                     ])
                     ->select([
                         'contents.id',
                         'info_contents.title as info_contents.title',
                         'info_categories.name as info_categories.name',
                         'contents.show_delete',
                     ]);

    }
}
