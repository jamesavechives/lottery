<?php

namespace App\Http\Controllers\Backend\Article;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Article\Article;
use App\Models\Category\Category;
use Redirect, Input, Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $article = Article::Paginate(10);
        return view('backend.article.index',['articles' => $article]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cats = Category::all();
        foreach ($cats as $key => $value) {
           $cat[$value->id] = $value->name;
        }
        //print_r($cat);
        return view('backend.article.create',['cat' => $cat]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $article = new Article;
        $article->title = Input::get('title');
        $article->desc = Input::get('desc');
        $article->category_id = Input::get('category_id');
        $article->content = Input::get('content');
        if ($article->save()) {
            return Redirect::to('admin/article/index');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $article = Article::findOrFail($id);
        $cats = Category::all();
        foreach ($cats as $key => $value) {
           $cat[$value->id] = $value->name;
        }
        $article['catall'] = $cat;
        return view('backend.article.edit',['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $article = Article::findOrFail($id);
        $article->title = Input::get('title');
        $article->desc = Input::get('desc');
        $article->category_id = Input::get('category_id');
        $article->content = Input::get('content');
        if ($article->save()) {
            return Redirect::to('admin/article/index');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $article = Article::findOrFail($id);
        $article->delete();
        return Redirect::to('admin/article/index');
    }
}
