<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis as Redis;
use URL;
use DB;
use Input;
class ZstController extends Controller{
    //走势图页面
    public function show($name,$qishu){
        return view('frontend.zst');
    }
    //组选120/60/30/。。。
    public function showdata(){
       return view('frontend.sjp');
    }
    /************************************
     * 静态数组
     *****************************************/
    public function showstatarr(){
        return view('frontend.statarr');
    }

    public function statarrinfo(Request $request){
        $redis      = Redis::connection('statarray');
        $thebig     =$redis->get('thebig');
        $name       = Input::get('name');  //彩票名称
        $qishu      = Input::get('qishu'); //期数
        $wei        = Input::get('wei');   //万千百十个相关位
        $sqldata    = DB::table($name)
            ->select('EID','QIHAO','WAN','QIAN','BAI','SHI','GE')
            ->orderBy('EID','desc')
            ->where('EID','<',$thebig)     
            ->Paginate($qishu)
            ->toArray();
        $sqldata['data'] = array_reverse($sqldata['data']);
        $sqldata['wei']  = $wei;
        foreach ($sqldata['data'] as $key => $value) {
            $sqldata['exps'][$value->EID] = get_object_vars(json_decode($redis->hget('yilou',$value->EID)));

        }
        // 转化为 json格式传值
        $data = json_encode($sqldata);
        return $data;
    }
    /************************************
     * 动态数组
     *****************************************/
    public function showlivearr(){
        return view('frontend.livearr');
    }

    public function livearrinfo(Request $request){
        $redis      = Redis::connection('livearray');
        $thebig     =$redis->get('thebig');
        $name       = Input::get('name');  //彩票名称
        $qishu      = Input::get('qishu'); //期数
        $wei        = Input::get('wei');   //万千百十个相关位
        $sqldata    = DB::table($name)
            ->select('EID','QIHAO','WAN','QIAN','BAI','SHI','GE')
            ->orderBy('EID','desc')
            ->where('EID','<',$thebig)
            ->Paginate($qishu)
            ->toArray();
        $sqldata['data'] = array_reverse($sqldata['data']);
        $sqldata['wei']  = $wei;
        
        foreach ($sqldata['data'] as $key => $value) {
            $sqldata['exps'][$value->EID] = get_object_vars(json_decode($redis->hget('yilou',$value->EID)));
        }
        // 转化为 json格式传值
        $data = json_encode($sqldata);
        return $data;
    }



    public function zuxuaninfo(Request $request){
        $name       = Input::get('name');  //彩票名称
        $qishu      = Input::get('qishu'); //期数
        $wei        = Input::get('wei');   //万千百十个相关位
        $thebig     = Redis::hgetall('nowindex')['big'];
        $sqldata    = DB::table($name)
                        ->select('EID','QIHAO','WAN','QIAN','BAI','SHI','GE')
                        ->orderBy('EID','desc')
                        ->where('EID','<',$thebig+1)
                        ->Paginate($qishu)
                        ->toArray();
        $sqldata['data'] = array_reverse($sqldata['data']);
        $sqldata['wei']  = $wei;
        foreach ($sqldata['data'] as $key => $value) {
            if($wei == 'QS' || $wei == array(1,2,3,4)){
                $sqldata['exps'][$value->EID] = get_object_vars(json_decode(Redis::hgetall('yilouge')[$value->EID])); 
            }else if($wei == 'HS' || $wei == array(2,3,4,5)){
                $sqldata['exps'][$value->EID] = get_object_vars(json_decode(Redis::hgetall('yilouwan')[$value->EID]));
            }else if($wei == array(1,3,4,5)){
                $sqldata['exps'][$value->EID] = get_object_vars(json_decode(Redis::hgetall('yilouqian')[$value->EID]));
            }else if($wei == array(1,2,4,5)){
                $sqldata['exps'][$value->EID] = get_object_vars(json_decode(Redis::hgetall('yiloubai')[$value->EID]));
            }else if($wei == array(1,2,3,5)){
                $sqldata['exps'][$value->EID] = get_object_vars(json_decode(Redis::hgetall('yiloushi')[$value->EID]));
            }else{
                $sqldata['exps'][$value->EID] = get_object_vars(json_decode(Redis::hgetall('yilou')[$value->EID]));
            }
        }
        // 转化为 json格式传值
        $data = json_encode($sqldata);
        return $data;
    }

    public function zuxuanexptj(Request $request){
        $wei        = Input::get('wei');   //万千百十个相关位 
        if($wei == "QS" || $wei == array(1,2,3,4)){
            $nowinfo = Redis::hgetall('tongjige')['count'];
        }else if($wei == 'HS' || $wei == array(2,3,4,5)){
            $nowinfo = Redis::hgetall('tongjiwan')['count'];
        }else if($wei == array(1,3,4,5)){
            $nowinfo = Redis::hgetall('tongjiqian')['count'];
        }else if($wei == array(1,2,4,5)){
            $nowinfo = Redis::hgetall('tongjibai')['count'];
        }else if($wei == array(1,2,3,5)){
            $nowinfo = Redis::hgetall('tongjishi')['count'];
        }else{
           $nowinfo = Redis::hgetall('tongji')['count']; 
        }
        return $nowinfo;
    }

    public function zuxuanexptj2(Request $request){
        $wei        = Input::get('wei');   //万千百十个相关位

        if($wei == "QS" || $wei == array(1,2,3,4)){
            $nowinfo = Redis::hgetall('tongjige')['pjyl'];
        }else if($wei == 'HS' || $wei == array(2,3,4,5)){
            $nowinfo = Redis::hgetall('tongjiwan')['pjyl'];
        }else if($wei == array(1,3,4,5)){
            $nowinfo = Redis::hgetall('tongjiqian')['pjyl'];
        }else if($wei == array(1,2,4,5)){
            $nowinfo = Redis::hgetall('tongjibai')['pjyl'];
        }else if($wei == array(1,2,3,5)){
            $nowinfo = Redis::hgetall('tongjishi')['pjyl'];
        }else{
           $nowinfo = Redis::hgetall('tongji')['pjyl']; 
        }
        return $nowinfo;
    }

    public function zuxuanexptj3(Request $request){
        $wei        = Input::get('wei');   //万千百十个相关位
        if($wei == "QS" || $wei == array(1,2,3,4)){
            $nowinfo = Redis::hgetall('tongjige')['zdyl'];
        }else if($wei == 'HS' || $wei == array(2,3,4,5)){
            $nowinfo = Redis::hgetall('tongjiwan')['zdyl'];
        }else if($wei == array(1,3,4,5)){
            $nowinfo = Redis::hgetall('tongjiqian')['zdyl'];
        }else if($wei == array(1,2,4,5)){
            $nowinfo = Redis::hgetall('tongjibai')['zdyl'];
        }else if($wei == array(1,2,3,5)){
            $nowinfo = Redis::hgetall('tongjishi')['zdyl'];
        }else{
           $nowinfo = Redis::hgetall('tongji')['zdyl']; 
        }
        return $nowinfo;
    }
    public function zuxuanexptj4(Request $request){
        $wei        = Input::get('wei');   //万千百十个相关位
        if($wei == "QS" || $wei == array(1,2,3,4)){
            $nowinfo = Redis::hgetall('tongjige')['zdlc'];
        }else if($wei == 'HS' || $wei == array(2,3,4,5)){
            $nowinfo = Redis::hgetall('tongjiwan')['zdlc'];
        }else if($wei == array(1,3,4,5)){
            $nowinfo = Redis::hgetall('tongjiqian')['zdlc'];
        }else if($wei == array(1,2,4,5)){
            $nowinfo = Redis::hgetall('tongjibai')['zdlc'];
        }else if($wei == array(1,2,3,5)){
            $nowinfo = Redis::hgetall('tongjishi')['zdlc'];
        }else{
           $nowinfo = Redis::hgetall('tongji')['zdlc']; 
        }
        return $nowinfo;
    }

    //ajax信息
    //数据传递
   public function data(Request $request){
        //获取前端数据条件
        $name       = Input::get('name');  //彩票名称
        $qishu      = Input::get('qishu'); //期数
        $wei        = Input::get('wei');   //万千百十个相关位
        // 从数据库中查询出相应条件的数据 并转化为数组格式  默认为对象
        $sqldata    = DB::table($name)
                        ->select('EID','QIHAO','WAN','QIAN','BAI','SHI','GE')
                        ->orderBy('EID','desc')
                        ->Paginate($qishu)
                        ->toArray();
        // 升降平中需要用到的上一期的值
        $lastdata   = DB::table($name)
                        ->select('EID','QIHAO','WAN','QIAN','BAI','SHI','GE')
                        ->orderBy('EID','desc')
                        ->skip($qishu)->take(6)->get();
        foreach ($lastdata as $k => $v) {
            $newlast[$k] = get_object_vars($v); 
        }           
        // 将搜索结果中data的信息反转 从前往后排列
        $sqldata['data'] = array_reverse($sqldata['data']);
        // 获取相关位置 /万千百十个相关位置
        $sqldata['wei']  = $wei;
        // 第19期信息
        $sqldata['last'] = $newlast;
        // 转化为 json格式传值
        $data = json_encode($sqldata);
        return $data;
   }
    //时间设置
    public function timeset(){
        //白天开奖时间
    	$starttimestr  = "10:00:00";
        //晚上开奖时间
    	$endtimestr    = "22:00:00";
        //将开奖时间转化为当天的开奖时间 格式为时间戳
    	$starttime     = strtotime($starttimestr);  //白天
		$endtime       = strtotime($endtimestr);    //晚上
		$nowtime       = time(); //现在
        //当前时间在白天的时间段内
		if($nowtime>$starttime && $nowtime<$endtime){
		    $tale_pass       = ($nowtime-$starttime);
            $tale_pass_cishu = $tale_pass/600;
            $nextcishu       = ceil($tale_pass_cishu);
            $nexttime        = ($nextcishu*600)+$starttime+138;             
		}else{ //当前时间在晚上时间段内
            $tale_pass       = ($nowtime-$starttime);
            $tale_pass_cishu = $tale_pass/300; //300
            $nextcishu       = ceil($tale_pass_cishu);
            $nexttime        = ($nextcishu*300)+$starttime+80; //300 60
        }
        //剩余时间
		$lefttime     = $nexttime-$nowtime;
		$arr=array(
		    'lefttime'  => $lefttime,
		);
        //将剩余时间转化为json格式
		$time = json_encode($arr);
        return $time;
    }
    //统计页面  该方法目前写的有些粗糙  后期注意修改
    public function datatj(){
        $data = DB::table('cqssc')
                    ->select('EID','WAN','QIAN','BAI','SHI','GE')
                    ->orderBy('EID','desc')
                    ->take(120)
                    ->get();
        foreach ($data as $key => $val) {
            $cv[$key] = get_object_vars($val);
        }
        foreach ($cv as $key => $value) {
            $value = array_splice($value,1);
            $abc = array_unique(array_values($value));
            sort($abc);
            $cbd[$key] = implode(",",$abc);
        }
        $str = implode(',', $cbd);
        $bigarr = explode(",",$str);
        //出现次数
        $cishu = array_count_values ($bigarr);
        ksort($cishu);
        //print_r($cishu);
        //最大遗漏//最大练出
        $yllc0 = array(); $yllc1 = array(); $yllc2 = array(); $yllc3 = array(); $yllc4 = array(); $yllc5 = array(); $yllc6 = array(); $yllc7 = array(); $yllc8 = array(); $yllc9 = array();
        foreach ($cbd as $ke => $val) {
            for($g=0;$g<10;$g++){
                if (preg_match ("/$g/i", $val)){ 
                    //array_push($yllc[$g],$ke);
                    if($g == 0){
                        array_push($yllc0,$ke);
                    }
                    if($g == 1){
                        array_push($yllc1,$ke);
                    } 
                    if($g == 2){
                        array_push($yllc2,$ke);
                    } 
                    if($g == 3){
                        array_push($yllc3,$ke);
                    } 
                    if($g == 4){
                        array_push($yllc4,$ke);
                    } 
                    if($g == 5){
                        array_push($yllc5,$ke);
                    } 
                    if($g == 6){
                        array_push($yllc6,$ke);
                    } 
                    if($g == 7){
                        array_push($yllc7,$ke);
                    } 
                    if($g == 8){
                        array_push($yllc8,$ke);
                    } 
                    if($g == 9){
                        array_push($yllc9,$ke);
                    }  
                }
            }
        }
        //print_r($yllc0);
    $pj0 = array(); $pj1 = array(); $pj2 = array(); $pj3 = array(); $pj4 = array(); $pj5 = array();$pj6 = array(); $pj7 = array(); $pj8 = array(); $pj9 = array();

        $ni = array();
        foreach ($cbd as $key => $value) {
            for($r=0; $r<10; $r++){
                if(isset($ni[$r]) == false){
                    $ni[$r]=1;
                }
                if(preg_match ("/$r/i", $value)){
                    $ni[$r]=1;
                }else{
                    if($r == 0){
                        array_push($pj0,$ni[$r]);
                        $ni[$r] += 1;
                    }
                    if($r == 1){
                        array_push($pj1,$ni[$r]);
                        $ni[$r] += 1;
                    }
                    if($r == 2){
                        array_push($pj2,$ni[$r]);
                        $ni[$r] += 1;
                    }
                    if($r == 3){
                        array_push($pj3,$ni[$r]);
                        $ni[$r] += 1;
                    }
                    if($r == 4){
                        array_push($pj4,$ni[$r]);
                        $ni[$r] += 1;
                    }
                    if($r == 5){
                        array_push($pj5,$ni[$r]);
                        $ni[$r] += 1;
                    }
                    if($r == 6){
                        array_push($pj6,$ni[$r]);
                        $ni[$r] += 1;
                    }
                    if($r == 7){
                        array_push($pj7,$ni[$r]);
                        $ni[$r] += 1;
                    }
                    if($r == 8){
                        array_push($pj8,$ni[$r]);
                        $ni[$r] += 1;
                    }
                    if($r == 9){
                        array_push($pj9,$ni[$r]);
                        $ni[$r] += 1;
                    }
                    
                }
            }
           
        }
        //平均遗漏
        $tpj0 = round(array_sum($pj0)/$cishu[0]);
        $tpj1 = round(array_sum($pj1)/$cishu[1]);
        $tpj2 = round(array_sum($pj2)/$cishu[2]);
        $tpj3 = round(array_sum($pj3)/$cishu[3]);
        $tpj4 = round(array_sum($pj4)/$cishu[4]);
        $tpj5 = round(array_sum($pj5)/$cishu[5]);
        $tpj6 = round(array_sum($pj6)/$cishu[6]);
        $tpj7 = round(array_sum($pj7)/$cishu[7]);
        $tpj8 = round(array_sum($pj8)/$cishu[8]);
        $tpj9 = round(array_sum($pj9)/$cishu[9]);

        $arr=array(
            'showtimes' => $cishu,
            'yllc0'   => $yllc0,
            'yllc1'   => $yllc1,
            'yllc2'   => $yllc2,
            'yllc3'   => $yllc3,
            'yllc4'   => $yllc4,
            'yllc5'   => $yllc5,
            'yllc6'   => $yllc6,
            'yllc7'   => $yllc7,
            'yllc8'   => $yllc8,
            'yllc9'   => $yllc9,
            'tpj0'    => $tpj0,
            'tpj1'    => $tpj1,
            'tpj2'    => $tpj2,
            'tpj3'    => $tpj3,
            'tpj4'    => $tpj4,
            'tpj5'    => $tpj5,
            'tpj6'    => $tpj6,
            'tpj7'    => $tpj7,
            'tpj8'    => $tpj8,
            'tpj9'    => $tpj9
        );

        $tongji = json_encode($arr);
        return $tongji;
    }
    //胆码
    public function danma(Request $request){
        $type       = Input::get('type'); //类型 胆码//号码组；
        $value      = Input::get('value');//待筛选的值
        $ddtype     = Input::get('dadi'); //大底类型
        $restype    = Input::get('method');  //取值类型 保留/取反
        $seachtype  = Input::get('seachtype'); //筛选类型 单选//组选
        $nums       = Input::get('shownums'); //号码组的取位
        $value_str = implode($value); //传过来的值的字符串形式 
        if(!empty($nums) && $nums == 0){
            //将字符串拆分为数组
            $value_arrs = explode(',', $value_str);
            foreach ($value_arrs as $kk => $vv) {
                for($ij = 0; $ij<strlen($vv); $ij++){
                    $arrij[$kk][] = substr($vv, $ij, 1);
                }      
                $value_arr[$kk] = array_diff($base_value, $arrij[$kk]);
            }
            foreach ($value_arr as $key => $value) {
                $value_arr[$key] = implode($value); 
            }
        }else{
           $value_arr = explode(',', $value_str); //将传来的值，取消逗号生成新的数组 

        }
        //生成大底
        if($ddtype == 2){
            for($dda = 0; $dda<10; $dda++){
                for($ddb = 0; $ddb<10; $ddb++){
                    $dd_data[] = $dda.$ddb;
                    if($type == 2){
                        $dd_data_tr = $dda.$ddb.$ddc.$ddd.$dde;
                        if(self::checknum($value,$dd_data_tr) == $nums){
                                $reszs[]=$dd_data_tr;
                            }
                    }
                }
            }
        }elseif($ddtype == 3){
            for($dda = 0; $dda<10; $dda++){
                for($ddb = 0; $ddb<10; $ddb++){
                    for($ddc = 0; $ddc<10; $ddc++){
                        $dd_data[] = $dda.$ddb.$ddc;
                        if($type == 2){
                            $dd_data_tr = $dda.$ddb.$ddc.$ddd.$dde;
                            if(self::checknum($value,$dd_data_tr) == $nums){
                                $reszs[]=$dd_data_tr;
                            }
                        }
                    }
                }
            }
        }elseif($ddtype == 4){
            for($dda = 0; $dda<10; $dda++){
                for($ddb = 0; $ddb<10; $ddb++){
                    for($ddc = 0; $ddc<10; $ddc++){
                        for($ddd = 0; $ddd<10; $ddd++){
                            $dd_data[] = $dda.$ddb.$ddc.$ddd;
                            if($type == 2){
                                $dd_data_tr = $dda.$ddb.$ddc.$ddd.$dde;
                                if(self::checknum($value,$dd_data_tr) == $nums){
                                    $reszs[]=$dd_data_tr;
                                }
                            }
                        }
                    }
                }
            }
        }else{
            for($dda = 0; $dda<10; $dda++){
                for($ddb = 0; $ddb<10; $ddb++){
                    for($ddc = 0; $ddc<10; $ddc++){
                        for($ddd = 0; $ddd<10; $ddd++){
                            for($dde = 0; $dde<10; $dde++){
                                $dd_data[] = $dda.$ddb.$ddc.$ddd.$dde;
                                if($type == 2){
                                    $dd_data_tr = $dda.$ddb.$ddc.$ddd.$dde;
                                    if(self::checknum($value,$dd_data_tr) == $nums){
                                        $reszs[]=$dd_data_tr;
                                    }
                                }
                            }
                        }
                    }
                }
            } 
        }
        //筛选类型
        if($type == 2){
            if($seachtype == 1){//单选
                if($restype == 1){ //保留
                    $return_data['data'] = implode(',', $reszs);
                    $return_data['count'] = count($reszs);
                    return $return_data;
                }elseif($restype == 2){  //取反
                    $last_data_diff = array_diff($dd_data, $reszs);
                    $return_data['data'] = implode(',', $last_data_diff);
                    $return_data['count'] = count($last_data_diff);    
                    return $return_data;
                }
            }else{ //组选
                foreach ($reszs as $key => $val) {
                    for($in = 0; $in < strlen($val); $in++){
                        $last_data_zx[$key][] = substr($val,$in,1);
                    }
                    sort($last_data_zx[$key]);
                }
                foreach ($last_data_zx as $key => $value) {
                    $last_data_zx[$key] = implode($value);
                }
                $last_data_zx = array_unique($last_data_zx);
                if($restype == 1){ //保留
                    $return_data['data'] = implode(',', $last_data_zx);
                    $return_data['count'] = count($last_data_zx);   
                    return $return_data;
                }elseif($restype == 2){  //取反
                    $last_data_zx_diff = array_diff($dd_data, $last_data_zx);
                    $return_data['data'] = implode(',', $last_data_zx_diff);
                    $return_data['count'] = count($last_data_zx_diff);  
                    return $return_data;
                }
            }
        }else{//胆码
            if(count($value_arr) > 1){
                foreach ($value_arr as $k => $v) {//单一的
                    for($i = 0; $i<strlen($v); $i++){
                        $wat_str_one = substr($v,$i,1);
                        $data_one[] = preg_grep ("/($wat_str_one){1,5}/", $dd_data);
                    }
                }
                foreach ($data_one as $k => $v) {
                    foreach ($v as $value) {
                        $last_data_one [] = $value;
                    }
                }
                $dd_data_self = $dd_data;
                foreach ($value_arr as $ka => $va) {//组合的
                    for($j = 0; $j<strlen($va); $j++){
                        $wat_str_two  = substr($va,$j,1);
                        $data_two[$ka] = preg_grep ("/($wat_str_two){1,5}/", $dd_data_self);
                        $dd_data_self = $data_two[$ka];
                    }
                }
                foreach ($data_two as $key => $v) {
                    foreach ($v as $value) {
                        $last_data_two[] = $value;
                    }
                }
                if(empty($last_data_two)){
                    $last_data = array_unique($last_data_one);
                }else{
                    $last_data = array_unique(array_merge($last_data_one, $last_data_two));
                }
            }else{ //没有逗号
                $dd_data_self = $dd_data;
                foreach ($value_arr as $ka => $va) {//组合的
                    for($j = 0; $j<strlen($va); $j++){
                        $wat_str_two  = substr($va,$j,1);
                        $data_two[$ka] = preg_grep ("/($wat_str_two){1,5}/", $dd_data_self);
                        $dd_data_self = $data_two[$ka];
                    }
                }
                foreach ($data_two as $key => $v) {
                    foreach ($v as $value) {
                        $last_data_two[] = $value;
                    }
                }
                $last_data = array_unique($last_data_two);
            }
            
            if($seachtype == 1){//单选
                if($restype == 1){ //保留
                    $return_data['data'] = implode(',', $last_data);
                    $return_data['count'] = count($last_data);
                    return $return_data;
                }elseif($restype == 2){  //取反
                    $last_data_diff = array_diff($dd_data, $last_data);
                    $return_data['data'] = implode(',', $last_data_diff);
                    $return_data['count'] = count($last_data_diff);    
                    return $return_data;
                }
            }else{ //组选
                foreach ($last_data as $key => $val) {
                    for($in = 0; $in < strlen($val); $in++){
                        $last_data_zx[$key][] = substr($val,$in,1);
                    }
                    sort($last_data_zx[$key]);
                }
                foreach ($last_data_zx as $key => $value) {
                    $last_data_zx[$key] = implode($value);
                }
                $last_data_zx = array_unique($last_data_zx);
                if($restype == 1){ //保留
                    $return_data['data'] = implode(',', $last_data_zx);
                    $return_data['count'] = count($last_data_zx);   
                    return $return_data;
                }elseif($restype == 2){  //取反
                    $last_data_zx_diff = array_diff($dd_data, $last_data_zx);
                    $return_data['data'] = implode(',', $last_data_zx_diff);
                    $return_data['count'] = count($last_data_zx_diff);  
                    return $return_data;
                }
                
            }
        }
    }

    public function zuxuan(Request $request){

        $need = Input::get('need'); //类型 胆码//号码组；
        $type = Input::get('type');
        if($type == 1){
           for($dda = 0; $dda<10; $dda++){ //生成大底
                for($ddb = 0; $ddb<10; $ddb++){
                    for($ddc = 0; $ddc<10; $ddc++){
                        for($ddd = 0; $ddd<10; $ddd++){
                            for($dde = 0; $dde<10; $dde++){
                                $dd_data[] = $dda.','.$ddb.','.$ddc.','.$ddd.','.$dde;
                            }
                        }
                    }
                }
            }
            foreach($dd_data as $key => $val){
                $news   = explode(',', $val);
                $newarr = implode(array_count_values($news));
                if($newarr == 1211 || $newarr == 1121 || $newarr == 1112 || $newarr == 2111){ //60
                    $zxdata[1][]    = implode($news);
                }elseif($newarr == 11111){ //120
                    $zxdata[0][]    = implode($news);
                }elseif($newarr == 212|| $newarr == 221 || $newarr == 122){//30
                    $zxdata[2][]    = implode($news);
                }elseif($newarr == 131|| $newarr == 311 || $newarr == 113){ //20
                    $zxdata[3][]    = implode($news);
                }elseif($newarr == 32 || $newarr == 23){//10
                    $zxdata[4][]    = implode($news);
                }elseif($newarr == 41 || $newarr == 14 || $newarr == 5){//5
                    $zxdata[5][]    = implode($news);
                }
            } 
        }else{
            for($dda = 0; $dda<10; $dda++){ //生成大底
                for($ddb = 0; $ddb<10; $ddb++){
                    for($ddc = 0; $ddc<10; $ddc++){
                        for($ddd = 0; $ddd<10; $ddd++){
                            $dd_data[] = $dda.','.$ddb.','.$ddc.','.$ddd;
                        }
                    }
                }
            }
            foreach($dd_data as $key => $val){
                $news   = explode(',', $val);
                $newarr = implode(array_count_values($news));
                if($newarr == 121 || $newarr == 112 || $newarr == 211){ //12
                    $zxdata[1][]    = implode($news);
                }elseif($newarr == 1111){ //24
                    $zxdata[0][]    = implode($news);
                }elseif($newarr == 22){//6
                    $zxdata[2][]    = implode($news);
                }elseif($newarr == 13|| $newarr == 31){//4
                    $zxdata[3][]    = implode($news);
                }elseif($newarr == 4){//2
                    $zxdata[4][]    = implode($news);
                }
            }   
        }
        if($type == 1){
            if(count($need) == 1){
                if($need[0] == 'all'){
                    $cards = array_merge($zxdata[0],$zxdata[1],$zxdata[2],$zxdata[3],$zxdata[4],$zxdata[5]);
                    $rel['data'] = implode(',', $cards); 
                    $rel['count'] = count($cards);
                    return $rel; 
                }else{
                    $rel['data'] = implode(',',$zxdata[$need[0]]);
                    $rel['count'] = count($zxdata[$need[0]]);
                    return $rel;
                }
            }else{
                $str = '';
                $count = 0;
                $nowarray=array();
                foreach ($need as $kk => $value) {
                    $str .= implode(',',$zxdata[$value]);
                    $count += count($zxdata[$value]);
//                    if(count($nowarray)>0){
//                        $nowarray=array_intersect($nowarray,$zxdata[$value]);
//                    }
//                    else{
//                        $nowarray=$zxdata[$value];
//                    }
                    
                }
//                $str = implode(',',$nowarray);
//                $count = count($nowarray);
                $rel['data'] = $str;
                $rel['count'] = $count; 
                return $rel;
            }
        }else{
            if(count($need) == 1){
                if($need[0] == 'all'){
                    $cards = array_merge($zxdata[0],$zxdata[1],$zxdata[2],$zxdata[3],$zxdata[4]);
                    $rel['data'] = implode(',', $cards); 
                    $rel['count'] = count($cards);
                    return $rel; 
                }else{
                    $rel['data'] = implode(',',$zxdata[$need[0]]);
                    $rel['count'] = count($zxdata[$need[0]]);
                    return $rel;
                }
            }else{
                $str = '';
                $count = 0;
                foreach ($need as $kk => $value) {
                    $str .= implode(',',$zxdata[$value]);
                    $count += count($zxdata[$value]);
                }
                $rel['data'] = $str;
                $rel['count'] = $count; 
                return $rel;
            }
        }
        
    }
    
    //当前类方法
    public function checknum($check_num,$num){
        $result_num=0; 
        foreach($check_num as $value){  
            $result_num+=substr_count($num,$value);   
        }
        return $result_num;
    }
}
