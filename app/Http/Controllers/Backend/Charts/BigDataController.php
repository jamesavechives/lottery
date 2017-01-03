<?php

namespace App\Http\Controllers\Backend\Charts;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis as Redis;
use Redirect;

class BigDataController extends Controller{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //
        return view('backend.bigdata.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        //
        $redis = Redis::connection('big_data');
        $name  = 'bigdata'.$id;

        if($redis -> zCard($name)){
            return Redirect::back()->withInput()->withErrors('注意：'.$id.'位大底数已经存在！');
        }else{
            if($id == 5){
                for($dda = 0; $dda<10; $dda++){
                    for($ddb = 0; $ddb<10; $ddb++){
                        for($ddc = 0; $ddc<10; $ddc++){
                            for($ddd = 0; $ddd<10; $ddd++){
                                for($dde = 0; $dde<10; $dde++){
                                    $dd_data[] = $dda.$ddb.$ddc.$ddd.$dde;
                                }
                            }
                        }
                    }
                }

                foreach($dd_data as $key=>$val){
                    $redis->zAdd($name,$key,$val);
                }

                return Redirect::back()->withInput()->withErrors('恭喜：'.$id.'位大底数生成成功！');
            }else if($id == 4){
                for($dda = 0; $dda<10; $dda++){
                    for($ddb = 0; $ddb<10; $ddb++){
                        for($ddc = 0; $ddc<10; $ddc++){
                            for($ddd = 0; $ddd<10; $ddd++){
                                $dd_data[] = $dda.$ddb.$ddc.$ddd;
                            }
                        }
                    }
                }

                foreach($dd_data as $key=>$val){
                    $redis->zadd($name,$key,$val);
                }

                return Redirect::back()->withInput()->withErrors('恭喜：'.$id.'位大底数生成成功！');
            }else if($id == 3){
                for($dda = 0; $dda<10; $dda++){
                    for($ddb = 0; $ddb<10; $ddb++){
                        for($ddc = 0; $ddc<10; $ddc++){
                            $dd_data[] = $dda.$ddb.$ddc;
                        }
                    }
                }

                foreach($dd_data as $key=>$val){
                    $redis->zAdd($name,$key,$val);
                }

                return Redirect::back()->withInput()->withErrors('恭喜：'.$id.'位大底数生成成功！');
            }else if($id == 2){
                for($dda = 0; $dda<10; $dda++){
                    for($ddb = 0; $ddb<10; $ddb++){
                        $dd_data[] = $dda.$ddb;
                    }
                }

                foreach($dd_data as $key=>$val){
                    $redis->zAdd($name,$key,$val);
                }

                return Redirect::back()->withInput()->withErrors('恭喜：'.$id.'位大底数生成成功！');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //
        return Redirect::back()->withInput()->withErrors('没有这个操作啦！不要瞎闹好吗？');
    }
}
