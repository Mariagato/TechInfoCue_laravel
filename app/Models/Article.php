<?php

namespace App\Models;

use App\Traits\Storable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    use Storable;

    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'date'];
    protected $path = 'article';

    /**
     * Info del artículo.
     * @return mixed
     * Created by  <Rhiss.net>
     */
    public function info()
    {
        return $this->hasOne(InfoArticle::class)->where('lang', \Lang::locale());
    }

    /**
     * Categoría del artículo.
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
     * Galería de vídeos.
     * @return mixed
     * Created by  <Rhiss.net>
     */
    public function videos()
    {
        return $this->hasManyThrough(InfoVideo::class, Video::class, 'id', 'video_id',
            'video_gallery_id')->orderBy('position');
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
        return $query->join('info_articles', 'info_articles.article_id', '=', 'articles.id')
                     ->leftJoin('info_categories', 'info_categories.category_id', '=', 'articles.category_id')
                     ->where([
                         'info_articles.lang'   => \Lang::locale(),
                         'info_categories.lang' => \Lang::locale()
                     ])
                     ->select([
                         'articles.id',
                         'info_articles.title as info_articles.title',
                         'info_categories.name as info_categories.name',
                         'articles.date'
                     ]);

    }
}
