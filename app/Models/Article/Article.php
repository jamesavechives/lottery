<?php

namespace App\Models\Article;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The database table article by the model.
     *
     * @var string
     */
    protected $table = 'articles';
    /**
     * 获取关联到父级分类
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category\Category');
    }

}
