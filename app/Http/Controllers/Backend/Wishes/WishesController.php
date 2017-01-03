<?php

namespace App\Http\Controllers\Backend\Wishes;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Wish\Wish;
use Redirect, Input, Auth;

class WishesController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //
        $wishes = Wish::Paginate(10);
        return view('backend.wishes.index',['wishes' => $wishes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
        return view('backend.wishes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //
        $wish             = new Wish;
        $wish->name       = Input::get('name');
        $wish->content    = Input::get('content');
        $wish->begin      = Input::get('begin');
        $wish->end        = Input::get('end');
        if ($wish->save()) {
            return Redirect::to('admin/wishes/index');
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
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        //
        $wish = Wish::findOrFail($id);
        //dd($wish->begin);
        return view('backend.wishes.edit',['wish' => $wish]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        //
        $wish             = Wish::findOrFail($id);
        $wish->name       = Input::get('name');
        $wish->content    = Input::get('content');
        $wish->begin      = Input::get('begin');
        $wish->end        = Input::get('end');
        if ($wish->save()) {
            return Redirect::to('admin/wishes/index');
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
    public function destroy($id){
        //
        $wish             = Wish::findOrFail($id);
        $wish ->delete();
        return Redirect::to('admin/wishes/index');
    }
}
