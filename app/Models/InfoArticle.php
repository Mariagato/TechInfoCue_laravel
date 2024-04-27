<?php

namespace App\Models;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class InfoArticle extends Model
{
    use Translatable;

    protected $guarded = ['id'];
    protected $foregeinKey = 'article_id';

    /**
     * Artículo asociado a la info.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * Created by  <Rhiss.net>
     */
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
