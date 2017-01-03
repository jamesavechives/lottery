<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Article\Article;
/**
 * Class ArticleController
 * @package App\Http\Controllers\Frontend
 */
class ArticleController extends Controller{
    /**
     * @return mixed
     */
    public function info($id){
        $article = Article::find($id);
        return view('frontend.article.info',['article' => $article]);
    }
    public function cates($id){
        $article = Category::find($id);
        return view('frontend.article.cates',['article' => $article]);
    }
}
