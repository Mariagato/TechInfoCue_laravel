<?php

namespace App\Models;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class InfoCategory extends Model
{
    use Translatable;

    protected $guarded = ['id'];
    protected $foregeinKey = 'category_id';

    /**
     * Categoría asociada a la info.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * Created by  <Rhiss.net>
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
