<?php

namespace App\Http\Controllers\Backend\Charts;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Charts\StaticArray;
use Illuminate\Support\Facades\Redis as Redis;
use Redirect, Input, Auth;

class StaticArrayController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //
        $arr = StaticArray::Paginate(20);
        return view('backend.staticarray.index',['arrs' => $arr]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
        return view('backend.staticarray.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //
        $title       = Input::get('title');
        $zone_nums   = Input::get('zone_nums');
        $begin_nums  = Input::get('begin_nums');
        $desc        = Input::get('desc');

        $arr = new StaticArray;
        $arr->title       = $title;
        $arr->zone_nums   = $zone_nums;
        $arr->begin_nums  = $begin_nums;
        $arr->desc        = $desc;

        if ($arr->save()) {
            $redis = Redis::connection('zst_set');

            for($i = 1; $i <= $zone_nums; $i++){
                $arr_chird['par']       = $title;
                $arr_chird['xu']        = $i;
                $arr_chird['name']      = $title.$i;
                $arr_chird['val']       = $begin_nums++;
                $arr_chird['info']      = ' ';

                $arr_chird_json     = json_encode($arr_chird);

                $redis->hset($arr->title, $i ,$arr_chird_json);
            }

            return Redirect::to('admin/staticarray/index');

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
        $arr    = StaticArray::find($id);
        $title  = $arr->title;
        $redis  = Redis::connection('zst_set');

        $info = $redis-> hgetall($title);

        foreach($info as $key=>$val){
            $info[$key] = json_decode($val);
        }
        //print_r($info);
        return view('backend.staticarray.show',['infos'=>$info]);

    }

    public function chird($name,$id){
        $redis  = Redis::connection('zst_set');
        $arr    = json_decode($redis-> hget($name,$id));
        //print_r($arr);
        return view('backend.staticarray.chird',['arr'=>$arr]);
    }

    public function change(Request $request, $id){
        $arr['name'] = $request->name;
        $arr['info'] = $request->info;
        $arr['par']  = $request->par;
        $arr['xu']   = $id;
        $arr['val']  = $request->val;

        $parid = StaticArray::where('title',$arr['par'])->first();

        //echo $parid->id;
        //print_r(json_encode($request->par));
        $arr_chird_json = json_encode($arr);

        $redis  = Redis::connection('zst_set');

        $redis->hset($request->par, $id ,$arr_chird_json);

        return Redirect::to('admin/staticarray/show/'.$parid->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
    }
}
