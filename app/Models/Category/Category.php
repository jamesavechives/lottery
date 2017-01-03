<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The database table cate by the model.
     *
     * @var string
     */
    protected $table;
    /**
     * 获取关联到分类的文章
     */
    public function article()
    {
        return $this->hasMany('App\Models\Article\Article');
    }

    public function __construct()
    {
        $this->table = config('menus.category_table');
    }

}
