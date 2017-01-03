<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis as Redis;
use DB;
use Input;

class MakeredisController extends Controller{
	public function makedata(){
	$nowindex    = Redis::hgetall('nowindex')['big'];  //获取数据库中的EID 用于判断是否进行更新
	$nowinfo     = Redis::hgetall('yilou')[$nowindex];
        $nowinfowan  = Redis::hgetall('yilouwan')[$nowindex];
        $nowinfoqian = Redis::hgetall('yilouqian')[$nowindex];
        $nowinfobai  = Redis::hgetall('yiloubai')[$nowindex];
        $nowinfoshi  = Redis::hgetall('yiloushi')[$nowindex];
        $nowinfoge   = Redis::hgetall('yilouge')[$nowindex];

	$nowarr      = json_decode($nowinfo);
        $nowarrwan   = json_decode($nowinfowan);
        $nowarrqian  = json_decode($nowinfoqian);
        $nowarrbai   = json_decode($nowinfobai);
        $nowarrshi   = json_decode($nowinfoshi);
        $nowarrge    = json_decode($nowinfoge);

		$nowarrs     = get_object_vars(json_decode($nowinfo));
        $nowarrswan  = get_object_vars(json_decode($nowinfowan));
        $nowarrsqian = get_object_vars(json_decode($nowinfoqian));
        $nowarrsbai  = get_object_vars(json_decode($nowinfobai));
        $nowarrsshi  = get_object_vars(json_decode($nowinfoshi));
        $nowarrsge   = get_object_vars(json_decode($nowinfoge));
		
		$dxjlsjp2yl     =get_object_vars($nowarrs['dxjlsjp2yl']);
        $dxjlsjp2ylwan  =get_object_vars($nowarrswan['dxjlsjp2yl']);
        $dxjlsjp2ylqian =get_object_vars($nowarrsqian['dxjlsjp2yl']);
        $dxjlsjp2ylbai  =get_object_vars($nowarrsbai['dxjlsjp2yl']);
        $dxjlsjp2ylshi  =get_object_vars($nowarrsshi['dxjlsjp2yl']);
        $dxjlsjp2ylge   =get_object_vars($nowarrsge['dxjlsjp2yl']); 

		$dxjlsjpyl      =get_object_vars($nowarrs['dxjlsjpyl']);
        $dxjlsjpylwan   =get_object_vars($nowarrswan['dxjlsjpyl']);
        $dxjlsjpylqian  =get_object_vars($nowarrsqian['dxjlsjpyl']);
        $dxjlsjpylbai   =get_object_vars($nowarrsbai['dxjlsjpyl']);
        $dxjlsjpylshi   =get_object_vars($nowarrsshi['dxjlsjpyl']);
        $dxjlsjpylge    =get_object_vars($nowarrsge['dxjlsjpyl']);

		$dxjlyl         =get_object_vars($nowarrs['dxjlyl']);
        $dxjlylwan      =get_object_vars($nowarrswan['dxjlyl']);
        $dxjlylqian     =get_object_vars($nowarrsqian['dxjlyl']);
        $dxjlylbai      =get_object_vars($nowarrsbai['dxjlyl']);
        $dxjlylshi      =get_object_vars($nowarrsshi['dxjlyl']);
        $dxjlylge       =get_object_vars($nowarrsge['dxjlyl']);

		$dxsjp2yl       = get_object_vars($nowarrs['dxsjp2yl']);
        $dxsjp2ylwan    = get_object_vars($nowarrswan['dxsjp2yl']);
        $dxsjp2ylqian   = get_object_vars($nowarrsqian['dxsjp2yl']);
        $dxsjp2ylbai    = get_object_vars($nowarrsbai['dxsjp2yl']);
        $dxsjp2ylshi    = get_object_vars($nowarrsshi['dxsjp2yl']);
        $dxsjp2ylge     = get_object_vars($nowarrsge['dxsjp2yl']);


		$dxsjpyl        =get_object_vars($nowarrs['dxsjpyl']);
        $dxsjpylwan     =get_object_vars($nowarrswan['dxsjpyl']);
        $dxsjpylqian    =get_object_vars($nowarrsqian['dxsjpyl']);
        $dxsjpylbai     =get_object_vars($nowarrsbai['dxsjpyl']);
        $dxsjpylshi     =get_object_vars($nowarrsshi['dxsjpyl']);
        $dxsjpylge      =get_object_vars($nowarrsge['dxsjpyl']);


		$dxyl           =get_object_vars($nowarrs['dxyl']); 
        $dxylwan        =get_object_vars($nowarrswan['dxyl']); 
        $dxylqian       =get_object_vars($nowarrsqian['dxyl']); 
        $dxylbai        =get_object_vars($nowarrsbai['dxyl']); 
        $dxylshi        =get_object_vars($nowarrsshi['dxyl']); 
        $dxylge         =get_object_vars($nowarrsge['dxyl']);

		$qm012jlsjp2yl    =get_object_vars($nowarrs['qm012jlsjp2yl']); 
        $qm012jlsjp2ylwan =get_object_vars($nowarrswan['qm012jlsjp2yl']); 
        $qm012jlsjp2ylqian=get_object_vars($nowarrsqian['qm012jlsjp2yl']); 
        $qm012jlsjp2ylbai =get_object_vars($nowarrsbai['qm012jlsjp2yl']); 
        $qm012jlsjp2ylshi =get_object_vars($nowarrsshi['qm012jlsjp2yl']); 
        $qm012jlsjp2ylge  =get_object_vars($nowarrsge['qm012jlsjp2yl']); 


		$qm012jlsjpyl     =get_object_vars($nowarrs['qm012jlsjpyl']); 
        $qm012jlsjpylwan  =get_object_vars($nowarrswan['qm012jlsjpyl']); 
        $qm012jlsjpylqian =get_object_vars($nowarrsqian['qm012jlsjpyl']); 
        $qm012jlsjpylbai  =get_object_vars($nowarrsbai['qm012jlsjpyl']); 
        $qm012jlsjpylshi  =get_object_vars($nowarrsshi['qm012jlsjpyl']); 
        $qm012jlsjpylge   =get_object_vars($nowarrsge['qm012jlsjpyl']); 


		$qm012jlyl        =get_object_vars($nowarrs['qm012jlyl']); 
        $qm012jlylwan     =get_object_vars($nowarrswan['qm012jlyl']); 
        $qm012jlylqian    =get_object_vars($nowarrsqian['qm012jlyl']); 
        $qm012jlylbai     =get_object_vars($nowarrsbai['qm012jlyl']); 
        $qm012jlylshi     =get_object_vars($nowarrsshi['qm012jlyl']); 
        $qm012jlylge      =get_object_vars($nowarrsge['qm012jlyl']); 


		$qm012sjp2yl      =get_object_vars($nowarrs['qm012sjp2yl']); 
        $qm012sjp2ylwan   =get_object_vars($nowarrswan['qm012sjp2yl']); 
        $qm012sjp2ylqian  =get_object_vars($nowarrsqian['qm012sjp2yl']); 
        $qm012sjp2ylbai   =get_object_vars($nowarrsbai['qm012sjp2yl']); 
        $qm012sjp2ylshi   =get_object_vars($nowarrsshi['qm012sjp2yl']); 
        $qm012sjp2ylge    =get_object_vars($nowarrsge['qm012sjp2yl']); 


		$qm012sjpyl       =get_object_vars($nowarrs['qm012sjpyl']); 
        $qm012sjpylwan    =get_object_vars($nowarrswan['qm012sjpyl']); 
        $qm012sjpylqian   =get_object_vars($nowarrsqian['qm012sjpyl']); 
        $qm012sjpylbai    =get_object_vars($nowarrsbai['qm012sjpyl']); 
        $qm012sjpylshi    =get_object_vars($nowarrsshi['qm012sjpyl']); 
        $qm012sjpylge     =get_object_vars($nowarrsge['qm012sjpyl']); 


		$qm012yl          =get_object_vars($nowarrs['qm012yl']); 
        $qm012ylwan       =get_object_vars($nowarrswan['qm012yl']); 
        $qm012ylqian      =get_object_vars($nowarrsqian['qm012yl']); 
        $qm012ylbai       =get_object_vars($nowarrsbai['qm012yl']); 
        $qm012ylshi       =get_object_vars($nowarrsshi['qm012yl']); 
        $qm012ylge        =get_object_vars($nowarrsge['qm012yl']); 

		$jl4sjp2yl        =get_object_vars($nowarrs['jl4sjp2yl']);
        $jl4sjp2ylwan     =get_object_vars($nowarrswan['jl4sjp2yl']); 
        $jl4sjp2ylqian    =get_object_vars($nowarrsqian['jl4sjp2yl']); 
        $jl4sjp2ylbai     =get_object_vars($nowarrsbai['jl4sjp2yl']); 
        $jl4sjp2ylshi     =get_object_vars($nowarrsshi['jl4sjp2yl']); 
        $jl4sjp2ylge      =get_object_vars($nowarrsge['jl4sjp2yl']); 


        $jl4sjpyl         =get_object_vars($nowarrs['jl4sjpyl']); 
		$jl4sjpylwan      =get_object_vars($nowarrswan['jl4sjpyl']); 
        $jl4sjpylqian     =get_object_vars($nowarrsqian['jl4sjpyl']); 
        $jl4sjpylbai      =get_object_vars($nowarrsbai['jl4sjpyl']); 
        $jl4sjpylshi      =get_object_vars($nowarrsshi['jl4sjpyl']); 
        $jl4sjpylge       =get_object_vars($nowarrsge['jl4sjpyl']); 
        
		$jl4yl           =get_object_vars($nowarrs['jl4yl']); 
        $jl4ylwan        =get_object_vars($nowarrswan['jl4yl']); 
        $jl4ylqian       =get_object_vars($nowarrsqian['jl4yl']); 
        $jl4ylbai        =get_object_vars($nowarrsbai['jl4yl']); 
        $jl4ylshi        =get_object_vars($nowarrsshi['jl4yl']); 
        $jl4ylge         =get_object_vars($nowarrsge['jl4yl']); 


		$jl3sjp2yl       =get_object_vars($nowarrs['jl3sjp2yl']); 
        $jl3sjp2ylwan    =get_object_vars($nowarrswan['jl3sjp2yl']); 
        $jl3sjp2ylqian   =get_object_vars($nowarrsqian['jl3sjp2yl']); 
        $jl3sjp2ylbai    =get_object_vars($nowarrsbai['jl3sjp2yl']); 
        $jl3sjp2ylshi    =get_object_vars($nowarrsshi['jl3sjp2yl']); 
        $jl3sjp2ylge     =get_object_vars($nowarrsge['jl3sjp2yl']); 

		$jl3sjpyl        =get_object_vars($nowarrs['jl3sjpyl']); 
        $jl3sjpylwan     =get_object_vars($nowarrswan['jl3sjpyl']); 
        $jl3sjpylqian    =get_object_vars($nowarrsqian['jl3sjpyl']); 
        $jl3sjpylbai     =get_object_vars($nowarrsbai['jl3sjpyl']); 
        $jl3sjpylshi     =get_object_vars($nowarrsshi['jl3sjpyl']); 
        $jl3sjpylge      =get_object_vars($nowarrsge['jl3sjpyl']); 


		$jl3yl           =get_object_vars($nowarrs['jl3yl']);
        $jl3ylwan        =get_object_vars($nowarrswan['jl3yl']);
        $jl3ylqian       =get_object_vars($nowarrsqian['jl3yl']); 
        $jl3ylbai        =get_object_vars($nowarrsbai['jl3yl']);
        $jl3ylshi        =get_object_vars($nowarrsshi['jl3yl']);
        $jl3ylge         =get_object_vars($nowarrsge['jl3yl']);


		$jl2sjp2yl       =get_object_vars($nowarrs['jl2sjp2yl']); 
        $jl2sjp2ylwan    =get_object_vars($nowarrswan['jl2sjp2yl']); 
        $jl2sjp2ylqian   =get_object_vars($nowarrsqian['jl2sjp2yl']); 
        $jl2sjp2ylbai    =get_object_vars($nowarrsbai['jl2sjp2yl']); 
        $jl2sjp2ylshi    =get_object_vars($nowarrsshi['jl2sjp2yl']); 
        $jl2sjp2ylge     =get_object_vars($nowarrsge['jl2sjp2yl']); 


		$jl2sjpyl        =get_object_vars($nowarrs['jl2sjpyl']);
        $jl2sjpylwan     =get_object_vars($nowarrswan['jl2sjpyl']);
        $jl2sjpylqian    =get_object_vars($nowarrsqian['jl2sjpyl']);
        $jl2sjpylbai     =get_object_vars($nowarrsbai['jl2sjpyl']);
        $jl2sjpylshi     =get_object_vars($nowarrsshi['jl2sjpyl']);
        $jl2sjpylge      =get_object_vars($nowarrsge['jl2sjpyl']);


		$jl2yl           =get_object_vars($nowarrs['jl2yl']); 
        $jl2ylwan        =get_object_vars($nowarrswan['jl2yl']); 
        $jl2ylqian       =get_object_vars($nowarrsqian['jl2yl']); 
        $jl2ylbai        =get_object_vars($nowarrsbai['jl2yl']); 
        $jl2ylshi        =get_object_vars($nowarrsshi['jl2yl']); 
        $jl2ylge         =get_object_vars($nowarrsge['jl2yl']); 


		$jlsjp2yl        =get_object_vars($nowarrs['jlsjp2yl']); 
        $jlsjp2ylwan     =get_object_vars($nowarrswan['jlsjp2yl']); 
        $jlsjp2ylqian    =get_object_vars($nowarrsqian['jlsjp2yl']); 
        $jlsjp2ylbai     =get_object_vars($nowarrsbai['jlsjp2yl']); 
        $jlsjp2ylshi     =get_object_vars($nowarrsshi['jlsjp2yl']); 
        $jlsjp2ylge      =get_object_vars($nowarrsge['jlsjp2yl']); 


		$jlsjpyl         =get_object_vars($nowarrs['jlsjpyl']); 
        $jlsjpylwan      =get_object_vars($nowarrswan['jlsjpyl']); 
        $jlsjpylqian     =get_object_vars($nowarrsqian['jlsjpyl']); 
        $jlsjpylbai      =get_object_vars($nowarrsbai['jlsjpyl']); 
        $jlsjpylshi      =get_object_vars($nowarrsshi['jlsjpyl']); 
        $jlsjpylge       =get_object_vars($nowarrsge['jlsjpyl']); 


		$jlyl            =get_object_vars($nowarrs['jlyl']); 
        $jlylwan         =get_object_vars($nowarrswan['jlyl']); 
        $jlylqian        =get_object_vars($nowarrsqian['jlyl']); 
        $jlylbai         =get_object_vars($nowarrsbai['jlyl']); 
        $jlylshi         =get_object_vars($nowarrsshi['jlyl']); 
        $jlylge          =get_object_vars($nowarrsge['jlyl']); 


		$sjpyl2          =get_object_vars($nowarrs['sjpyl2']); 
        $sjpyl2wan       =get_object_vars($nowarrswan['sjpyl2']); 
        $sjpyl2qian      =get_object_vars($nowarrsqian['sjpyl2']); 
        $sjpyl2bai       =get_object_vars($nowarrsbai['sjpyl2']); 
        $sjpyl2shi       =get_object_vars($nowarrsshi['sjpyl2']); 
        $sjpyl2ge        =get_object_vars($nowarrsge['sjpyl2']); 


		$sjpyl           = get_object_vars($nowarrs['sjpyl']);
        $sjpylwan        = get_object_vars($nowarrswan['sjpyl']);
        $sjpylqian       = get_object_vars($nowarrsqian['sjpyl']);
        $sjpylbai        = get_object_vars($nowarrsbai['sjpyl']);
        $sjpylshi        = get_object_vars($nowarrsshi['sjpyl']);
        $sjpylge         = get_object_vars($nowarrsge['sjpyl']);

		$one             = get_object_vars($nowarrs['one']); 
        $onewan          = get_object_vars($nowarrswan['one']); 
        $oneqian         = get_object_vars($nowarrsqian['one']); 
        $onebai          = get_object_vars($nowarrsbai['one']); 
        $oneshi          = get_object_vars($nowarrsshi['one']); 
        $onege           = get_object_vars($nowarrsge['one']); 


		$jlsjpjlyl       =get_object_vars($nowarrs['jlsjpjlyl']); 
        $jlsjpjlylwan    =get_object_vars($nowarrswan['jlsjpjlyl']); 
        $jlsjpjlylqian   =get_object_vars($nowarrsqian['jlsjpjlyl']); 
        $jlsjpjlylbai    =get_object_vars($nowarrsbai['jlsjpjlyl']); 
        $jlsjpjlylshi    =get_object_vars($nowarrsshi['jlsjpjlyl']); 
        $jlsjpjlylge     =get_object_vars($nowarrsge['jlsjpjlyl']); 


        $jlsjpjlsjpyl    =get_object_vars($nowarrs['jlsjpjlsjpyl']); 
        $jlsjpjlsjpylwan =get_object_vars($nowarrswan['jlsjpjlsjpyl']); 
        $jlsjpjlsjpylqian=get_object_vars($nowarrsqian['jlsjpjlsjpyl']); 
        $jlsjpjlsjpylbai =get_object_vars($nowarrsbai['jlsjpjlsjpyl']); 
        $jlsjpjlsjpylshi =get_object_vars($nowarrsshi['jlsjpjlsjpyl']); 
        $jlsjpjlsjpylge  =get_object_vars($nowarrsge['jlsjpjlsjpyl']); 


        $jlsjpjlsjp2yl   =get_object_vars($nowarrs['jlsjpjlsjp2yl']);
        $jlsjpjlsjp2ylwan=get_object_vars($nowarrswan['jlsjpjlsjp2yl']);
        $jlsjpjlsjp2ylqian=get_object_vars($nowarrsqian['jlsjpjlsjp2yl']);
        $jlsjpjlsjp2ylbai=get_object_vars($nowarrsbai['jlsjpjlsjp2yl']);
        $jlsjpjlsjp2ylshi=get_object_vars($nowarrsshi['jlsjpjlsjp2yl']);
        $jlsjpjlsjp2ylge =get_object_vars($nowarrsge['jlsjpjlsjp2yl']);


        $sjpjlyl         =get_object_vars($nowarrs['sjpjlyl']); 
        $sjpjlylwan      =get_object_vars($nowarrswan['sjpjlyl']); 
        $sjpjlylqian     =get_object_vars($nowarrsqian['sjpjlyl']); 
        $sjpjlylbai      =get_object_vars($nowarrsbai['sjpjlyl']); 
        $sjpjlylshi      =get_object_vars($nowarrsshi['sjpjlyl']); 
        $sjpjlylge       =get_object_vars($nowarrsge['sjpjlyl']); 


        $sjpjlsjpyl      =get_object_vars($nowarrs['sjpjlsjpyl']); 
        $sjpjlsjpylwan   =get_object_vars($nowarrswan['sjpjlsjpyl']); 
        $sjpjlsjpylqian  =get_object_vars($nowarrsqian['sjpjlsjpyl']); 
        $sjpjlsjpylbai   =get_object_vars($nowarrsbai['sjpjlsjpyl']); 
        $sjpjlsjpylshi   =get_object_vars($nowarrsshi['sjpjlsjpyl']); 
        $sjpjlsjpylge    =get_object_vars($nowarrsge['sjpjlsjpyl']); 


        $sjpjlsjp2yl     =get_object_vars($nowarrs['sjpjlsjp2yl']); 
        $sjpjlsjp2ylwan  =get_object_vars($nowarrswan['sjpjlsjp2yl']); 
        $sjpjlsjp2ylqian =get_object_vars($nowarrsqian['sjpjlsjp2yl']); 
        $sjpjlsjp2ylbai  =get_object_vars($nowarrsbai['sjpjlsjp2yl']); 
        $sjpjlsjp2ylshi  =get_object_vars($nowarrsshi['sjpjlsjp2yl']); 
        $sjpjlsjp2ylge   =get_object_vars($nowarrsge['sjpjlsjp2yl']); 

        $zxtj='zxtj';

        $newindex = $nowindex+1;
		while (
			$data =  DB::table('cqssc')
                  -> select('EID','QIHAO','WAN','QIAN','BAI','SHI','GE')
                  -> where('EID', '=', $newindex++)
                  -> get()
            ){
			$number_arr      = array($data[0]->WAN,$data[0]->QIAN,$data[0]->BAI,$data[0]->SHI,$data[0]->GE);
            $number_arrwan   = array($data[0]->QIAN,$data[0]->BAI,$data[0]->SHI,$data[0]->GE);
            $number_arrqian  = array($data[0]->WAN,$data[0]->BAI,$data[0]->SHI,$data[0]->GE);
            $number_arrbai   = array($data[0]->WAN,$data[0]->QIAN,$data[0]->SHI,$data[0]->GE);
            $number_arrshi   = array($data[0]->WAN,$data[0]->QIAN,$data[0]->BAI,$data[0]->GE);
            $number_arrge    = array($data[0]->WAN,$data[0]->QIAN,$data[0]->BAI,$data[0]->SHI);

            $zuxuan_res      = self::zuxuan120($number_arr);
            $zuxuan_reswan   = self::zuxuan120($number_arrwan);
            $zuxuan_resqian  = self::zuxuan120($number_arrqian);
            $zuxuan_resbai   = self::zuxuan120($number_arrbai);
            $zuxuan_resshi   = self::zuxuan120($number_arrshi);
            $zuxuan_resge    = self::zuxuan120($number_arrge);

            $last_zuxuan_res     = $nowarr    ->zuxuan_val;
            $last_zuxuan_reswan  = $nowarrwan ->zuxuan_val;
            $last_zuxuan_resqian = $nowarrqian->zuxuan_val;
            $last_zuxuan_resbai  = $nowarrbai ->zuxuan_val;
            $last_zuxuan_resshi  = $nowarrshi ->zuxuan_val;
            $last_zuxuan_resge   = $nowarrge  ->zuxuan_val;

            $eid = $data[0]->EID;

            for($a=1;$a<7;$a++){
                if($a == $zuxuan_res[1]){
                    $one[$a] = 0;
                }else{
                    $one[$a] += 1;
                }
            }

            for($a=1;$a<6;$a++){
                if($a == $zuxuan_reswan[1]){
                    $onewan[$a] = 0;
                }else{
                    $onewan[$a] += 1;
                }//wan
                if($a == $zuxuan_resqian[1]){
                    $oneqian[$a] = 0;
                }else{
                    $oneqian[$a] += 1;
                }//qian
                if($a == $zuxuan_resbai[1]){
                    $onebai[$a] = 0;
                }else{
                    $onebai[$a] += 1;
                }
                if($a == $zuxuan_resshi[1]){
                    $oneshi[$a] = 0;
                }else{
                    $oneshi[$a] += 1;
                }
                if($a == $zuxuan_resge[1]){
                    $onege[$a] = 0;
                }else{
                    $onege[$a] += 1;
                }
            }

            foreach ($one as $k => $value) {
               ${'zxtj'.$k} = get_object_vars(json_decode(Redis::hgetall('zxtj')['zxtj'.$k])); 
               ${'zxtj'.$k}[]  = $value;
               Redis::command('HSET', ['zxtj', 'zxtj'.$k, json_encode(${'zxtj'.$k})]);
            }

            foreach ($onewan as $k => $value) {
               ${'zxtjwan'.$k} = get_object_vars(json_decode(Redis::hgetall('zxtjwan')['zxtj'.$k])); 
               ${'zxtjwan'.$k}[]  = $value;
               Redis::command('HSET', ['zxtjwan', 'zxtj'.$k, json_encode(${'zxtjwan'.$k})]);
            }
            foreach ($oneqian as $k => $value) {
               ${'zxtjqian'.$k} = get_object_vars(json_decode(Redis::hgetall('zxtjqian')['zxtj'.$k])); 
               ${'zxtjqian'.$k}[]  = $value;
               Redis::command('HSET', ['zxtjqian', 'zxtj'.$k, json_encode(${'zxtjqian'.$k})]);
            }
            foreach ($onebai as $k => $value) {
               ${'zxtjbai'.$k} = get_object_vars(json_decode(Redis::hgetall('zxtjbai')['zxtj'.$k])); 
               ${'zxtjbai'.$k}[]  = $value;
               Redis::command('HSET', ['zxtjbai', 'zxtj'.$k, json_encode(${'zxtjbai'.$k})]);
            }
            foreach ($oneshi as $k => $value) {
               ${'zxtjshi'.$k} = get_object_vars(json_decode(Redis::hgetall('zxtjshi')['zxtj'.$k])); 
               ${'zxtjshi'.$k}[]  = $value;
               Redis::command('HSET', ['zxtjshi', 'zxtj'.$k, json_encode(${'zxtjshi'.$k})]);
            }
            foreach ($onege as $k => $value) {
               ${'zxtjge'.$k} = get_object_vars(json_decode(Redis::hgetall('zxtjge')['zxtj'.$k])); 
               ${'zxtjge'.$k}[]  = $value;
               Redis::command('HSET', ['zxtjge', 'zxtj'.$k, json_encode(${'zxtjge'.$k})]);
            }

            $zuxuanval     = $zuxuan_res[1];  //组选120值
            $zuxuanvalwan  = $zuxuan_reswan[1];  //组选120值
            $zuxuanvalqian = $zuxuan_resqian[1];  //组选120值
            $zuxuanvalbai  = $zuxuan_resbai[1];  //组选120值
            $zuxuanvalshi  = $zuxuan_resshi[1];  //组选120值
            $zuxuanvalge   = $zuxuan_resge[1];  //组选120值
            //升降屏
           	$sjp_res         = self::sjp_info($zuxuan_res[1],$last_zuxuan_res);
            $sjp_reswan      = self::sjp_info($zuxuan_reswan[1],$last_zuxuan_reswan);
            $sjp_resqian     = self::sjp_info($zuxuan_resqian[1],$last_zuxuan_resqian);
            $sjp_resbai      = self::sjp_info($zuxuan_resbai[1],$last_zuxuan_resbai);
            $sjp_resshi      = self::sjp_info($zuxuan_resshi[1],$last_zuxuan_resshi);
            $sjp_resge       = self::sjp_info($zuxuan_resge[1],$last_zuxuan_resge);
            for($a=1;$a<4;$a++){
                if($a == $sjp_res){
                    $sjpyl[$a] = 0;
                }else{
                    $sjpyl[$a] += 1;
                }

                if($a == $sjp_reswan){
                    $sjpylwan[$a] = 0;
                }else{
                    $sjpylwan[$a] += 1;
                }

                if($a == $sjp_resqian){
                    $sjpylqian[$a] = 0;
                }else{
                    $sjpylqian[$a] += 1;
                }
                if($a == $sjp_resbai){
                    $sjpylbai[$a] = 0;
                }else{
                    $sjpylbai[$a] += 1;
                }
                if($a == $sjp_resshi){
                    $sjpylshi[$a] = 0;
                }else{
                    $sjpylshi[$a] += 1;
                }
                if($a == $sjp_resge){
                    $sjpylge[$a] = 0;
                }else{
                    $sjpylge[$a] += 1;
                }
            }

            //升降屏的距离
            $sjp_jl_res       = self::jl_info($sjp_res,$nowarr->sjp);
            $sjp_jl_reswan    = self::jl_info($sjp_reswan,$nowarrwan->sjp);
            $sjp_jl_resqian   = self::jl_info($sjp_resqian,$nowarrqian->sjp);
            $sjp_jl_resbai    = self::jl_info($sjp_resbai,$nowarrbai->sjp);
            $sjp_jl_resshi    = self::jl_info($sjp_resshi,$nowarrshi->sjp);
            $sjp_jl_resge     = self::jl_info($sjp_resge,$nowarrge->sjp);
            for($a=0; $a<3; $a++){
                if($a == $sjp_jl_res){
                    $sjpjlyl[$a+1] = 0;
                }else{
                    $sjpjlyl[$a+1] += 1;
                }
                if($a == $sjp_jl_reswan){
                    $sjpjlylwan[$a+1] = 0;
                }else{
                    $sjpjlylwan[$a+1] += 1;
                }
                if($a == $sjp_jl_resqian){
                    $sjpjlylqian[$a+1] = 0;
                }else{
                    $sjpjlylqian[$a+1] += 1;
                }
                if($a == $sjp_jl_resbai){
                    $sjpjlylbai[$a+1] = 0;
                }else{
                    $sjpjlylbai[$a+1] += 1;
                }
                if($a == $sjp_jl_resshi){
                    $sjpjlylshi[$a+1] = 0;
                }else{
                    $sjpjlylshi[$a+1] += 1;
                }
                if($a == $sjp_jl_resge){
                    $sjpjlylge[$a+1] = 0;
                }else{
                    $sjpjlylge[$a+1] += 1;
                }
            }
            // 升降屏的距离的升降屏
            $sjp_jl_sjp_res     = self::sjp_info($sjp_jl_res,$nowarr->sjpjl);
            $sjp_jl_sjp_reswan   = self::sjp_info($sjp_jl_reswan,$nowarrwan->sjpjl);
            $sjp_jl_sjp_resqian   = self::sjp_info($sjp_jl_resqian,$nowarrqian->sjpjl);
            $sjp_jl_sjp_resbai   = self::sjp_info($sjp_jl_resbai,$nowarrbai->sjpjl);
            $sjp_jl_sjp_resshi   = self::sjp_info($sjp_jl_resshi,$nowarrshi->sjpjl);
            $sjp_jl_sjp_resge   = self::sjp_info($sjp_jl_resge,$nowarrge->sjpjl);
            for($a=1; $a<4; $a++){
                if($a == $sjp_jl_sjp_res){
                    $sjpjlsjpyl[$a] = 0;
                }else{
                    $sjpjlsjpyl[$a] += 1;
                }

                if($a == $sjp_jl_sjp_reswan){
                    $sjpjlsjpylwan[$a] = 0;
                }else{
                    $sjpjlsjpylwan[$a] += 1;
                }
                if($a == $sjp_jl_sjp_resqian){
                    $sjpjlsjpylqian[$a] = 0;
                }else{
                    $sjpjlsjpylqian[$a] += 1;
                }
                if($a == $sjp_jl_sjp_resbai){
                    $sjpjlsjpylbai[$a] = 0;
                }else{
                    $sjpjlsjpylbai[$a] += 1;
                }
                if($a == $sjp_jl_sjp_resshi){
                    $sjpjlsjpylshi[$a] = 0;
                }else{
                    $sjpjlsjpylshi[$a] += 1;
                }
                if($a == $sjp_jl_sjp_resge){
                    $sjpjlsjpylge[$a] = 0;
                }else{
                    $sjpjlsjpylge[$a] += 1;
                }
            }
            // 升降屏的距离的升降屏的升降屏
            $sjp_jl_sjp2_res  = self::sjp_info($sjp_jl_sjp_res,$nowarr->sjpjlsjp);
            $sjp_jl_sjp2_reswan  = self::sjp_info($sjp_jl_sjp_reswan,$nowarrwan->sjpjlsjp);
            $sjp_jl_sjp2_resqian  = self::sjp_info($sjp_jl_sjp_resqian,$nowarrqian->sjpjlsjp);
            $sjp_jl_sjp2_resbai  = self::sjp_info($sjp_jl_sjp_resbai,$nowarrbai->sjpjlsjp);
            $sjp_jl_sjp2_resshi  = self::sjp_info($sjp_jl_sjp_resshi,$nowarrshi->sjpjlsjp);
            $sjp_jl_sjp2_resge  = self::sjp_info($sjp_jl_sjp_resge,$nowarrge->sjpjlsjp);
            for($a=1; $a<4; $a++){
                    if($a == $sjp_jl_sjp2_res){
                        $sjpjlsjp2yl[$a] = 0;
                    }else{
                        $sjpjlsjp2yl[$a] += 1;
                    }

                    if($a == $sjp_jl_sjp2_reswan){
                        $sjpjlsjp2ylwan[$a] = 0;
                    }else{
                        $sjpjlsjp2ylwan[$a] += 1;
                    }
                    if($a == $sjp_jl_sjp2_resqian){
                        $sjpjlsjp2ylqian[$a] = 0;
                    }else{
                        $sjpjlsjp2ylqian[$a] += 1;
                    }
                    if($a == $sjp_jl_sjp2_resbai){
                        $sjpjlsjp2ylbai[$a] = 0;
                    }else{
                        $sjpjlsjp2ylbai[$a] += 1;
                    }
                    if($a == $sjp_jl_sjp2_resshi){
                        $sjpjlsjp2ylshi[$a] = 0;
                    }else{
                        $sjpjlsjp2ylshi[$a] += 1;
                    }
                    if($a == $sjp_jl_sjp2_resge){
                        $sjpjlsjp2ylge[$a] = 0;
                    }else{
                        $sjpjlsjp2ylge[$a] += 1;
                    }
                }
            //升降屏的升降屏
            $sjpdesjp_res          = self::sjp_info($sjp_res,$nowarr->sjp);
            $sjpdesjp_reswan          = self::sjp_info($sjp_reswan,$nowarrwan->sjp);
            $sjpdesjp_resqian          = self::sjp_info($sjp_resqian,$nowarrqian->sjp);
            $sjpdesjp_resbai          = self::sjp_info($sjp_resbai,$nowarrbai->sjp);
            $sjpdesjp_resshi          = self::sjp_info($sjp_resshi,$nowarrshi->sjp);
            $sjpdesjp_resge          = self::sjp_info($sjp_resge,$nowarrge->sjp);
            for($a=1;$a<4;$a++){
                    if($a == $sjpdesjp_res){
                        $sjpyl2[$a] = 0;
                    }else{
                        $sjpyl2[$a] += 1;
                    }

                    if($a == $sjpdesjp_reswan){
                        $sjpyl2wan[$a] = 0;
                    }else{
                        $sjpyl2wan[$a] += 1;
                    }
                    if($a == $sjpdesjp_resqian){
                        $sjpyl2qian[$a] = 0;
                    }else{
                        $sjpyl2qian[$a] += 1;
                    }
                    if($a == $sjpdesjp_resbai){
                        $sjpyl2bai[$a] = 0;
                    }else{
                        $sjpyl2bai[$a] += 1;
                    }
                    if($a == $sjpdesjp_resshi){
                        $sjpyl2shi[$a] = 0;
                    }else{
                        $sjpyl2shi[$a] += 1;
                    }
                    if($a == $sjpdesjp_resge){
                        $sjpyl2ge[$a] = 0;
                    }else{
                        $sjpyl2ge[$a] += 1;
                    }
                }
            //距离
            $jlinfo_res           = self::jl_info($zuxuan_res[1],$nowarr->zuxuan_val);
            $jlinfo_reswan           = self::jl_info($zuxuan_reswan[1],$nowarrwan->zuxuan_val);
            $jlinfo_resqian           = self::jl_info($zuxuan_resqian[1],$nowarrqian->zuxuan_val);
            $jlinfo_resbai           = self::jl_info($zuxuan_resbai[1],$nowarrbai->zuxuan_val);
            $jlinfo_resshi           = self::jl_info($zuxuan_resshi[1],$nowarrshi->zuxuan_val);
            $jlinfo_resge           = self::jl_info($zuxuan_resge[1],$nowarrge->zuxuan_val);
            for($a=0;$a<6;$a++){
                if($a == $jlinfo_res){
                     $jlyl[$a+1] = 0;
                }else{
                    $jlyl[$a+1] += 1;
                }
            }
            for($a=0;$a<5;$a++){
                if($a == $jlinfo_reswan){
                     $jlylwan[$a+1] = 0;
                }else{
                    $jlylwan[$a+1] += 1;
                }
                if($a == $jlinfo_resqian){
                     $jlylqian[$a+1] = 0;
                }else{
                    $jlylqian[$a+1] += 1;
                }
                if($a == $jlinfo_resbai){
                     $jlylbai[$a+1] = 0;
                }else{
                    $jlylbai[$a+1] += 1;
                }
                if($a == $jlinfo_resshi){
                     $jlylshi[$a+1] = 0;
                }else{
                    $jlylshi[$a+1] += 1;
                }
                if($a == $jlinfo_resge){
                     $jlylge[$a+1] = 0;
                }else{
                    $jlylge[$a+1] += 1;
                }
            }
            //距离的升降屏
            $jl_sjp_res              = self::sjp_info($jlinfo_res,$nowarr->jl);
            $jl_sjp_reswan              = self::sjp_info($jlinfo_reswan,$nowarrwan->jl);
            $jl_sjp_resqian              = self::sjp_info($jlinfo_resqian,$nowarrqian->jl);
            $jl_sjp_resbai              = self::sjp_info($jlinfo_resbai,$nowarrbai->jl);
            $jl_sjp_resshi              = self::sjp_info($jlinfo_resshi,$nowarrshi->jl);
            $jl_sjp_resge              = self::sjp_info($jlinfo_resge,$nowarrge->jl);
            for($a=1;$a<4;$a++){
                    if($a == $jl_sjp_res){
                        $jlsjpyl[$a] = 0;
                    }else{
                        $jlsjpyl[$a] += 1;
                    }
                    if($a == $jl_sjp_reswan){
                        $jlsjpylwan[$a] = 0;
                    }else{
                        $jlsjpylwan[$a] += 1;
                    }
                    if($a == $jl_sjp_resqian){
                        $jlsjpylqian[$a] = 0;
                    }else{
                        $jlsjpylqian[$a] += 1;
                    }
                    if($a == $jl_sjp_resbai){
                        $jlsjpylbai[$a] = 0;
                    }else{
                        $jlsjpylbai[$a] += 1;
                    }
                    if($a == $jl_sjp_resshi){
                        $jlsjpylshi[$a] = 0;
                    }else{
                        $jlsjpylshi[$a] += 1;
                    }
                    if($a == $jl_sjp_resge){
                        $jlsjpylge[$a] = 0;
                    }else{
                        $jlsjpylge[$a] += 1;
                    }
                }
            //距离的升降屏的距离
            $jl_sjp_jl_res           = self::jl_info($jl_sjp_res,$nowarr->jlsjp);
            $jl_sjp_jl_reswan           = self::jl_info($jl_sjp_reswan,$nowarrwan->jlsjp);
            $jl_sjp_jl_resqian           = self::jl_info($jl_sjp_resqian,$nowarrqian->jlsjp);
            $jl_sjp_jl_resbai           = self::jl_info($jl_sjp_resbai,$nowarrbai->jlsjp);
            $jl_sjp_jl_resshi           = self::jl_info($jl_sjp_resshi,$nowarrshi->jlsjp);
            $jl_sjp_jl_resge           = self::jl_info($jl_sjp_resge,$nowarrge->jlsjp);
            for($a=0;$a<3;$a++){
                if($a == $jl_sjp_jl_res){
                    $jlsjpjlyl[$a+1] = 0;
                }else{
                    $jlsjpjlyl[$a+1] += 1;
                }
                if($a == $jl_sjp_jl_reswan){
                    $jlsjpjlylwan[$a+1] = 0;
                }else{
                    $jlsjpjlylwan[$a+1] += 1;
                }
                if($a == $jl_sjp_jl_resqian){
                    $jlsjpjlylqian[$a+1] = 0;
                }else{
                    $jlsjpjlylqian[$a+1] += 1;
                }
                if($a == $jl_sjp_jl_resbai){
                    $jlsjpjlylbai[$a+1] = 0;
                }else{
                    $jlsjpjlylbai[$a+1] += 1;
                }
                if($a == $jl_sjp_jl_resshi){
                    $jlsjpjlylshi[$a+1] = 0;
                }else{
                    $jlsjpjlylshi[$a+1] += 1;
                }
                if($a == $jl_sjp_jl_resge){
                    $jlsjpjlylge[$a+1] = 0;
                }else{
                    $jlsjpjlylge[$a+1] += 1;
                }
            }
            //距离升降屏的距离的升降屏
            $jl_sjp_jl_sjp_res        = self::sjp_info($jl_sjp_jl_res,$nowarr->jlsjpjl);
            $jl_sjp_jl_sjp_reswan        = self::sjp_info($jl_sjp_jl_reswan,$nowarrwan->jlsjpjl);
            $jl_sjp_jl_sjp_resqian        = self::sjp_info($jl_sjp_jl_resqian,$nowarrqian->jlsjpjl);
            $jl_sjp_jl_sjp_resbai        = self::sjp_info($jl_sjp_jl_resbai,$nowarrbai->jlsjpjl);
            $jl_sjp_jl_sjp_resshi        = self::sjp_info($jl_sjp_jl_resshi,$nowarrshi->jlsjpjl);
            $jl_sjp_jl_sjp_resge        = self::sjp_info($jl_sjp_jl_resge,$nowarrge->jlsjpjl);
            for($a=1; $a<4; $a++){
                    if($a == $jl_sjp_jl_sjp_res){
                        $jlsjpjlsjpyl[$a] = 0;
                    }else{
                        $jlsjpjlsjpyl[$a] += 1;
                    }

                    if($a == $jl_sjp_jl_sjp_reswan){
                        $jlsjpjlsjpylwan[$a] = 0;
                    }else{
                        $jlsjpjlsjpylwan[$a] += 1;
                    }
                    if($a == $jl_sjp_jl_sjp_resqian){
                        $jlsjpjlsjpylqian[$a] = 0;
                    }else{
                        $jlsjpjlsjpylqian[$a] += 1;
                    }
                    if($a == $jl_sjp_jl_sjp_resbai){
                        $jlsjpjlsjpylbai[$a] = 0;
                    }else{
                        $jlsjpjlsjpylbai[$a] += 1;
                    }
                    if($a == $jl_sjp_jl_sjp_resshi){
                        $jlsjpjlsjpylshi[$a] = 0;
                    }else{
                        $jlsjpjlsjpylshi[$a] += 1;
                    }
                    if($a == $jl_sjp_jl_sjp_resge){
                        $jlsjpjlsjpylge[$a] = 0;
                    }else{
                        $jlsjpjlsjpylge[$a] += 1;
                    }
            }
            //距离升降屏的距离的升降屏的升降屏
            $jl_sjp_jl_sjp2_res        = self::sjp_info($jl_sjp_jl_sjp_res,$nowarr->jlsjpjlsjp);
            $jl_sjp_jl_sjp2_reswan        = self::sjp_info($jl_sjp_jl_sjp_reswan,$nowarrwan->jlsjpjlsjp);
            $jl_sjp_jl_sjp2_resqian        = self::sjp_info($jl_sjp_jl_sjp_resqian,$nowarrqian->jlsjpjlsjp);
            $jl_sjp_jl_sjp2_resbai        = self::sjp_info($jl_sjp_jl_sjp_resbai,$nowarrbai->jlsjpjlsjp);
            $jl_sjp_jl_sjp2_resshi        = self::sjp_info($jl_sjp_jl_sjp_resshi,$nowarrshi->jlsjpjlsjp);
            $jl_sjp_jl_sjp2_resge        = self::sjp_info($jl_sjp_jl_sjp_resge,$nowarrge->jlsjpjlsjp);
           	for($a=1; $a<4; $a++){
                if($a == $jl_sjp_jl_sjp2_res){
                        $jlsjpjlsjp2yl[$a] = 0;
                    }else{
                        $jlsjpjlsjp2yl[$a] += 1;
                    }
                    if($a == $jl_sjp_jl_sjp2_reswan){
                        $jlsjpjlsjp2ylwan[$a] = 0;
                    }else{
                        $jlsjpjlsjp2ylwan[$a] += 1;
                    }
                    if($a == $jl_sjp_jl_sjp2_resqian){
                        $jlsjpjlsjp2ylqian[$a] = 0;
                    }else{
                        $jlsjpjlsjp2ylqian[$a] += 1;
                    }
                    if($a == $jl_sjp_jl_sjp2_resbai){
                        $jlsjpjlsjp2ylbai[$a] = 0;
                    }else{
                        $jlsjpjlsjp2ylbai[$a] += 1;
                    }
                    if($a == $jl_sjp_jl_sjp2_resshi){
                        $jlsjpjlsjp2ylshi[$a] = 0;
                    }else{
                        $jlsjpjlsjp2ylshi[$a] += 1;
                    }
                    if($a == $jl_sjp_jl_sjp2_resge){
                        $jlsjpjlsjp2ylge[$a] = 0;
                    }else{
                        $jlsjpjlsjp2ylge[$a] += 1;
                    }
            }
            //距离的升降屏的升降屏
            $jl_sjp2_res             = self::sjp_info($jl_sjp_res,$nowarr->jlsjp);
            $jl_sjp2_reswan             = self::sjp_info($jl_sjp_reswan,$nowarrwan->jlsjp);
            $jl_sjp2_resqian             = self::sjp_info($jl_sjp_resqian,$nowarrqian->jlsjp);
            $jl_sjp2_resbai             = self::sjp_info($jl_sjp_resbai,$nowarrbai->jlsjp);
            $jl_sjp2_resshi             = self::sjp_info($jl_sjp_resshi,$nowarrshi->jlsjp);
            $jl_sjp2_resge             = self::sjp_info($jl_sjp_resge,$nowarrge->jlsjp);
            for($a=1;$a<4;$a++){
                    if($a == $jl_sjp2_res){
                        $jlsjp2yl[$a] = 0;
                    }else{
                        $jlsjp2yl[$a] += 1;
                    }
                    if($a == $jl_sjp2_reswan){
                        $jlsjp2ylwan[$a] = 0;
                    }else{
                        $jlsjp2ylwan[$a] += 1;
                    }
                    if($a == $jl_sjp2_resqian){
                        $jlsjp2ylqian[$a] = 0;
                    }else{
                        $jlsjp2ylqian[$a] += 1;
                    }
                    if($a == $jl_sjp2_resbai){
                        $jlsjp2ylbai[$a] = 0;
                    }else{
                        $jlsjp2ylbai[$a] += 1;
                    }
                    if($a == $jl_sjp2_resshi){
                        $jlsjp2ylshi[$a] = 0;
                    }else{
                        $jlsjp2ylshi[$a] += 1;
                    }
                    if($a == $jl_sjp2_resge){
                        $jlsjp2ylge[$a] = 0;
                    }else{
                        $jlsjp2ylge[$a] += 1;
                    }
                }
            //距离2
            $jl2info_res          = self::jl_info($jlinfo_res ,$nowarr->jl);
            $jl2info_reswan          = self::jl_info($jlinfo_reswan ,$nowarrwan->jl);
            $jl2info_resqian          = self::jl_info($jlinfo_resqian ,$nowarrqian->jl);
            $jl2info_resbai          = self::jl_info($jlinfo_resbai ,$nowarrbai->jl);
            $jl2info_resshi          = self::jl_info($jlinfo_resshi ,$nowarrshi->jl);
            $jl2info_resge          = self::jl_info($jlinfo_resge ,$nowarrge->jl);
            for($a=0;$a<5;$a++){
                    if($a == $jl2info_res){
                        $jl2yl[$a+1] = 0;
                    }else{
                        $jl2yl[$a+1] += 1;
                    }
                }
            for($a=0;$a<4;$a++){
                    if($a == $jl2info_reswan){
                        $jl2ylwan[$a+1] = 0;
                    }else{
                        $jl2ylwan[$a+1] += 1;
                    }
                    if($a == $jl2info_resqian){
                        $jl2ylqian[$a+1] = 0;
                    }else{
                        $jl2ylqian[$a+1] += 1;
                    }
                    if($a == $jl2info_resbai){
                        $jl2ylbai[$a+1] = 0;
                    }else{
                        $jl2ylbai[$a+1] += 1;
                    }
                    if($a == $jl2info_resshi){
                        $jl2ylshi[$a+1] = 0;
                    }else{
                        $jl2ylshi[$a+1] += 1;
                    }
                    if($a == $jl2info_resge){
                        $jl2ylge[$a+1] = 0;
                    }else{
                        $jl2ylge[$a+1] += 1;
                    }
                }
            //距离的升降屏
            $jl2_sjp_res              = self::sjp_info($jl2info_res,$nowarr->jl2);
            $jl2_sjp_reswan              = self::sjp_info($jl2info_reswan,$nowarrwan->jl2);
            $jl2_sjp_resqian              = self::sjp_info($jl2info_resqian,$nowarrqian->jl2);
            $jl2_sjp_resbai              = self::sjp_info($jl2info_resbai,$nowarrbai->jl2);
            $jl2_sjp_resshi              = self::sjp_info($jl2info_resshi,$nowarrshi->jl2);
            $jl2_sjp_resge              = self::sjp_info($jl2info_resge,$nowarrge->jl2);
            for($a=1;$a<4;$a++){
                    if($a == $jl2_sjp_res){
                        $jl2sjpyl[$a] = 0;
                    }else{
                        $jl2sjpyl[$a] += 1;
                    }

                    if($a == $jl2_sjp_reswan){
                        $jl2sjpylwan[$a] = 0;
                    }else{
                        $jl2sjpylwan[$a] += 1;
                    }
                    if($a == $jl2_sjp_resqian){
                        $jl2sjpylqian[$a] = 0;
                    }else{
                        $jl2sjpylqian[$a] += 1;
                    }
                    if($a == $jl2_sjp_resbai){
                        $jl2sjpylbai[$a] = 0;
                    }else{
                        $jl2sjpylbai[$a] += 1;
                    }
                    if($a == $jl2_sjp_resshi){
                        $jl2sjpylshi[$a] = 0;
                    }else{
                        $jl2sjpylshi[$a] += 1;
                    }
                    if($a == $jl2_sjp_resge){
                        $jl2sjpylge[$a] = 0;
                    }else{
                        $jl2sjpylge[$a] += 1;
                    }
                }
            //距离的升降屏的升降屏
            $jl2_sjp2_res             = self::sjp_info($jl2_sjp_res,$nowarr->jl2sjp);
            $jl2_sjp2_reswan             = self::sjp_info($jl2_sjp_reswan,$nowarrwan->jl2sjp);
            $jl2_sjp2_resqian             = self::sjp_info($jl2_sjp_resqian,$nowarrqian->jl2sjp);
            $jl2_sjp2_resbai             = self::sjp_info($jl2_sjp_resbai,$nowarrbai->jl2sjp);
            $jl2_sjp2_resshi             = self::sjp_info($jl2_sjp_resshi,$nowarrshi->jl2sjp);
            $jl2_sjp2_resge             = self::sjp_info($jl2_sjp_resge,$nowarrge->jl2sjp);
            for($a=1;$a<4;$a++){
                    if($a == $jl2_sjp2_res){
                        $jl2sjp2yl[$a] = 0;
                    }else{
                        $jl2sjp2yl[$a] += 1;
                    }

                    if($a == $jl2_sjp2_reswan){
                        $jl2sjp2ylwan[$a] = 0;
                    }else{
                        $jl2sjp2ylwan[$a] += 1;
                    }
                    if($a == $jl2_sjp2_resqian){
                        $jl2sjp2ylqian[$a] = 0;
                    }else{
                        $jl2sjp2ylqian[$a] += 1;
                    }
                    if($a == $jl2_sjp2_resbai){
                        $jl2sjp2ylbai[$a] = 0;
                    }else{
                        $jl2sjp2ylbai[$a] += 1;
                    }
                    if($a == $jl2_sjp2_resshi){
                        $jl2sjp2ylshi[$a] = 0;
                    }else{
                        $jl2sjp2ylshi[$a] += 1;
                    }
                    if($a == $jl2_sjp2_resge){
                        $jl2sjp2ylge[$a] = 0;
                    }else{
                        $jl2sjp2ylge[$a] += 1;
                    }
                }
            //距离3
            $jl3info_res          = self::jl_info($jl2info_res ,$nowarr->jl2);

            $jl3info_reswan          = self::jl_info($jl2info_reswan ,$nowarrwan->jl2);
            $jl3info_resqian          = self::jl_info($jl2info_resqian ,$nowarrqian->jl2);
            $jl3info_resbai          = self::jl_info($jl2info_resbai ,$nowarrbai->jl2);
            $jl3info_resshi          = self::jl_info($jl2info_resshi ,$nowarrshi->jl2);
            $jl3info_resge          = self::jl_info($jl2info_resge ,$nowarrge->jl2);
            for($a=0;$a<4;$a++){
                    if($a == $jl3info_res){
                        $jl3yl[$a+1] = 0;
                    }else{
                        $jl3yl[$a+1] += 1;
                    }
                }
            for($a=0;$a<3;$a++){
                    if($a == $jl3info_reswan){
                        $jl3ylwan[$a+1] = 0;
                    }else{
                        $jl3ylwan[$a+1] += 1;
                    }
                    if($a == $jl3info_resqian){
                        $jl3ylqian[$a+1] = 0;
                    }else{
                        $jl3ylqian[$a+1] += 1;
                    }
                    if($a == $jl3info_resbai){
                        $jl3ylbai[$a+1] = 0;
                    }else{
                        $jl3ylbai[$a+1] += 1;
                    }
                    if($a == $jl3info_resshi){
                        $jl3ylshi[$a+1] = 0;
                    }else{
                        $jl3ylshi[$a+1] += 1;
                    }
                    if($a == $jl3info_resge){
                        $jl3ylge[$a+1] = 0;
                    }else{
                        $jl3ylge[$a+1] += 1;
                    }
                }
            //距离的升降屏
            $jl3_sjp_res              = self::sjp_info($jl3info_res,$nowarr->jl3);

            $jl3_sjp_reswan              = self::sjp_info($jl3info_reswan,$nowarrwan->jl3);
            $jl3_sjp_resqian              = self::sjp_info($jl3info_resqian,$nowarrqian->jl3);
            $jl3_sjp_resbai              = self::sjp_info($jl3info_resbai,$nowarrbai->jl3);
            $jl3_sjp_resshi              = self::sjp_info($jl3info_resshi,$nowarrshi->jl3);
            $jl3_sjp_resge              = self::sjp_info($jl3info_resge,$nowarrge->jl3);
            for($a=1;$a<4;$a++){
                    if($a == $jl3_sjp_res){
                        $jl3sjpyl[$a] = 0;
                    }else{
                        $jl3sjpyl[$a] += 1;
                    }

                    if($a == $jl3_sjp_reswan){
                        $jl3sjpylwan[$a] = 0;
                    }else{
                        $jl3sjpylwan[$a] += 1;
                    }
                    if($a == $jl3_sjp_resqian){
                        $jl3sjpylqian[$a] = 0;
                    }else{
                        $jl3sjpylqian[$a] += 1;
                    }
                    if($a == $jl3_sjp_resbai){
                        $jl3sjpylbai[$a] = 0;
                    }else{
                        $jl3sjpylbai[$a] += 1;
                    }
                    if($a == $jl3_sjp_resshi){
                        $jl3sjpylshi[$a] = 0;
                    }else{
                        $jl3sjpylshi[$a] += 1;
                    }
                    if($a == $jl3_sjp_resge){
                        $jl3sjpylge[$a] = 0;
                    }else{
                        $jl3sjpylge[$a] += 1;
                    }
                }

            //距离的升降屏的升降屏
            $jl3_sjp2_res             = self::sjp_info($jl3_sjp_res,$nowarr->jl3sjp);

            $jl3_sjp2_reswan             = self::sjp_info($jl3_sjp_reswan,$nowarrwan->jl3sjp);
            $jl3_sjp2_resqian             = self::sjp_info($jl3_sjp_resqian,$nowarrqian->jl3sjp);
            $jl3_sjp2_resbai             = self::sjp_info($jl3_sjp_resbai,$nowarrbai->jl3sjp);
            $jl3_sjp2_resshi             = self::sjp_info($jl3_sjp_resshi,$nowarrshi->jl3sjp);
            $jl3_sjp2_resge             = self::sjp_info($jl3_sjp_resge,$nowarrge->jl3sjp);
            for($a=1;$a<4;$a++){
                    if($a == $jl3_sjp2_res){
                        $jl3sjp2yl[$a] = 0;
                    }else{
                        $jl3sjp2yl[$a] += 1;
                    }

                    if($a == $jl3_sjp2_reswan){
                        $jl3sjp2ylwan[$a] = 0;
                    }else{
                        $jl3sjp2ylwan[$a] += 1;
                    }
                    if($a == $jl3_sjp2_resqian){
                        $jl3sjp2ylqian[$a] = 0;
                    }else{
                        $jl3sjp2ylqian[$a] += 1;
                    }
                    if($a == $jl3_sjp2_resbai){
                        $jl3sjp2ylbai[$a] = 0;
                    }else{
                        $jl3sjp2ylbai[$a] += 1;
                    }
                    if($a == $jl3_sjp2_resshi){
                        $jl3sjp2ylshi[$a] = 0;
                    }else{
                        $jl3sjp2ylshi[$a] += 1;
                    }
                    if($a == $jl3_sjp2_resge){
                        $jl3sjp2ylge[$a] = 0;
                    }else{
                        $jl3sjp2ylge[$a] += 1;
                    }
                }
            //距离4
            $jl4info_res          = self::jl_info($jl3info_res ,$nowarr->jl3);

            $jl4info_reswan          = self::jl_info($jl3info_reswan ,$nowarrwan->jl3);
            $jl4info_resqian          = self::jl_info($jl3info_resqian ,$nowarrqian->jl3);
            $jl4info_resbai          = self::jl_info($jl3info_resbai ,$nowarrbai->jl3);
            $jl4info_resshi          = self::jl_info($jl3info_resshi ,$nowarrshi->jl3);
            $jl4info_resge          = self::jl_info($jl3info_resge ,$nowarrge->jl3);
            for($a=0;$a<3;$a++){
                    if($a == $jl4info_res){
                        $jl4yl[$a+1] = 0;
                    }else{
                        $jl4yl[$a+1] += 1;
                    }
                }
            for($a=0;$a<2;$a++){
                    if($a == $jl4info_reswan){
                        $jl4ylwan[$a+1] = 0;
                    }else{
                        $jl4ylwan[$a+1] += 1;
                    }
                    if($a == $jl4info_resqian){
                        $jl4ylqian[$a+1] = 0;
                    }else{
                        $jl4ylqian[$a+1] += 1;
                    }
                    if($a == $jl4info_resbai){
                        $jl4ylbai[$a+1] = 0;
                    }else{
                        $jl4ylbai[$a+1] += 1;
                    }
                    if($a == $jl4info_resshi){
                        $jl4ylshi[$a+1] = 0;
                    }else{
                        $jl4ylshi[$a+1] += 1;
                    }
                    if($a == $jl4info_resge){
                        $jl4ylge[$a+1] = 0;
                    }else{
                        $jl4ylge[$a+1] += 1;
                    }
                }
            //距离4的升降屏
            $jl4_sjp_res              = self::sjp_info($jl4info_res,$nowarr->jl4);

            $jl4_sjp_reswan              = self::sjp_info($jl4info_reswan,$nowarrwan->jl4);
            $jl4_sjp_resqian              = self::sjp_info($jl4info_resqian,$nowarrqian->jl4);
            $jl4_sjp_resbai              = self::sjp_info($jl4info_resbai,$nowarrbai->jl4);
            $jl4_sjp_resshi              = self::sjp_info($jl4info_resshi,$nowarrshi->jl4);
            $jl4_sjp_resge              = self::sjp_info($jl4info_resge,$nowarrge->jl4);
            for($a=1;$a<4;$a++){
                    if($a == $jl4_sjp_res){
                        $jl4sjpyl[$a] = 0;
                    }else{
                        $jl4sjpyl[$a] += 1;
                    }

                    if($a == $jl4_sjp_reswan){
                        $jl4sjpylwan[$a] = 0;
                    }else{
                        $jl4sjpylwan[$a] += 1;
                    }
                    if($a == $jl4_sjp_resqian){
                        $jl4sjpylqian[$a] = 0;
                    }else{
                        $jl4sjpylqian[$a] += 1;
                    }
                    if($a == $jl4_sjp_resbai){
                        $jl4sjpylbai[$a] = 0;
                    }else{
                        $jl4sjpylbai[$a] += 1;
                    }
                    if($a == $jl4_sjp_resshi){
                        $jl4sjpylshi[$a] = 0;
                    }else{
                        $jl4sjpylshi[$a] += 1;
                    }
                    if($a == $jl4_sjp_resge){
                        $jl4sjpylge[$a] = 0;
                    }else{
                        $jl4sjpylge[$a] += 1;
                    }
                }

            //距离4的升降屏的升降屏
            $jl4_sjp2_res             = self::sjp_info($jl4_sjp_res,$nowarr->jl4sjp);

            $jl4_sjp2_reswan             = self::sjp_info($jl4_sjp_reswan,$nowarrwan->jl4sjp);
            $jl4_sjp2_resqian             = self::sjp_info($jl4_sjp_resqian,$nowarrqian->jl4sjp);
            $jl4_sjp2_resbai             = self::sjp_info($jl4_sjp_resbai,$nowarrbai->jl4sjp);
            $jl4_sjp2_resshi             = self::sjp_info($jl4_sjp_resshi,$nowarrshi->jl4sjp);
            $jl4_sjp2_resge             = self::sjp_info($jl4_sjp_resge,$nowarrge->jl4sjp);
            for($a=1;$a<4;$a++){
                    if($a == $jl4_sjp2_res){
                        $jl4sjp2yl[$a] = 0;
                    }else{
                        $jl4sjp2yl[$a] += 1;
                    }

                    if($a == $jl4_sjp2_reswan){
                        $jl4sjp2ylwan[$a] = 0;
                    }else{
                        $jl4sjp2ylwan[$a] += 1;
                    }
                    if($a == $jl4_sjp2_resqian){
                        $jl4sjp2ylqian[$a] = 0;
                    }else{
                        $jl4sjp2ylqian[$a] += 1;
                    }
                    if($a == $jl4_sjp2_resbai){
                        $jl4sjp2ylbai[$a] = 0;
                    }else{
                        $jl4sjp2ylbai[$a] += 1;
                    }
                    if($a == $jl4_sjp2_resshi){
                        $jl4sjp2ylshi[$a] = 0;
                    }else{
                        $jl4sjp2ylshi[$a] += 1;
                    }
                    if($a == $jl4_sjp2_resge){
                        $jl4sjp2ylge[$a] = 0;
                    }else{
                        $jl4sjp2ylge[$a] += 1;
                    }
                }
            //012
            $qm012_res    = self::qm_info($zuxuan_res[1]);

            $qm012_reswan    = self::qm_info($zuxuan_reswan[1]);
            $qm012_resqian    = self::qm_info($zuxuan_resqian[1]);
            $qm012_resbai    = self::qm_info($zuxuan_resbai[1]);
            $qm012_resshi    = self::qm_info($zuxuan_resshi[1]);
            $qm012_resge    = self::qm_info($zuxuan_resge[1]);
            for($a=0;$a<3;$a++){
                    if($a == $qm012_res){
                        $qm012yl[$a+1] = 0;
                    }else{
                        $qm012yl[$a+1] += 1;
                    }

                    if($a == $qm012_reswan){
                        $qm012ylwan[$a+1] = 0;
                    }else{
                        $qm012ylwan[$a+1] += 1;
                    }
                    if($a == $qm012_resqian){
                        $qm012ylqian[$a+1] = 0;
                    }else{
                        $qm012ylqian[$a+1] += 1;
                    }
                    if($a == $qm012_resbai){
                        $qm012ylbai[$a+1] = 0;
                    }else{
                        $qm012ylbai[$a+1] += 1;
                    }
                    if($a == $qm012_resshi){
                        $qm012ylshi[$a+1] = 0;
                    }else{
                        $qm012ylshi[$a+1] += 1;
                    }
                    if($a == $qm012_resge){
                        $qm012ylge[$a+1] = 0;
                    }else{
                        $qm012ylge[$a+1] += 1;
                    }
                }
            //012升降屏
            $qm012_sjp_res   = self::sjp_info($qm012_res,$nowarr->qm012);

            $qm012_sjp_reswan   = self::sjp_info($qm012_reswan,$nowarrwan->qm012);
            $qm012_sjp_resqian   = self::sjp_info($qm012_resqian,$nowarrqian->qm012);
            $qm012_sjp_resbai   = self::sjp_info($qm012_resbai,$nowarrbai->qm012);
            $qm012_sjp_resshi   = self::sjp_info($qm012_resshi,$nowarrshi->qm012);
            $qm012_sjp_resge   = self::sjp_info($qm012_resge,$nowarrge->qm012);
            for($a=1;$a<4;$a++){
                    if($a == $qm012_sjp_res){
                        $qm012sjpyl[$a] = 0;
                    }else{
                        $qm012sjpyl[$a] += 1;
                    }

                    if($a == $qm012_sjp_reswan){
                        $qm012sjpylwan[$a] = 0;
                    }else{
                        $qm012sjpylwan[$a] += 1;
                    }
                    if($a == $qm012_sjp_resqian){
                        $qm012sjpylqian[$a] = 0;
                    }else{
                        $qm012sjpylqian[$a] += 1;
                    }
                    if($a == $qm012_sjp_resbai){
                        $qm012sjpylbai[$a] = 0;
                    }else{
                        $qm012sjpylbai[$a] += 1;
                    }
                    if($a == $qm012_sjp_resshi){
                        $qm012sjpylshi[$a] = 0;
                    }else{
                        $qm012sjpylshi[$a] += 1;
                    }
                    if($a == $qm012_sjp_resge){
                        $qm012sjpylge[$a] = 0;
                    }else{
                        $qm012sjpylge[$a] += 1;
                    }
                }
            //012升降屏的升降屏
            $qm012_sjp2_res    = self::sjp_info($qm012_sjp_res,$nowarr->qm012sjp);

            $qm012_sjp2_reswan    = self::sjp_info($qm012_sjp_reswan,$nowarrwan->qm012sjp);
            $qm012_sjp2_resqian    = self::sjp_info($qm012_sjp_resqian,$nowarrqian->qm012sjp);
            $qm012_sjp2_resbai    = self::sjp_info($qm012_sjp_resbai,$nowarrbai->qm012sjp);
            $qm012_sjp2_resshi    = self::sjp_info($qm012_sjp_resshi,$nowarrshi->qm012sjp);
            $qm012_sjp2_resge    = self::sjp_info($qm012_sjp_resge,$nowarrge->qm012sjp);
            for($a=1;$a<4;$a++){
                    if($a == $qm012_sjp2_res){
                        $qm012sjp2yl[$a] = 0;
                    }else{
                        $qm012sjp2yl[$a] += 1;
                    }

                    if($a == $qm012_sjp2_reswan){
                        $qm012sjp2ylwan[$a] = 0;
                    }else{
                        $qm012sjp2ylwan[$a] += 1;
                    }
                    if($a == $qm012_sjp2_resqian){
                        $qm012sjp2ylqian[$a] = 0;
                    }else{
                        $qm012sjp2ylqian[$a] += 1;
                    }
                    if($a == $qm012_sjp2_resbai){
                        $qm012sjp2ylbai[$a] = 0;
                    }else{
                        $qm012sjp2ylbai[$a] += 1;
                    }
                    if($a == $qm012_sjp2_resshi){
                        $qm012sjp2ylshi[$a] = 0;
                    }else{
                        $qm012sjp2ylshi[$a] += 1;
                    }
                    if($a == $qm012_sjp2_resge){
                        $qm012sjp2ylge[$a] = 0;
                    }else{
                        $qm012sjp2ylge[$a] += 1;
                    }
                }
            //012距离
            $qm012_jl_res     = self::jl_info($qm012_res,$nowarr->qm012);

            $qm012_jl_reswan     = self::jl_info($qm012_reswan,$nowarrwan->qm012);
            $qm012_jl_resqian     = self::jl_info($qm012_resqian,$nowarrqian->qm012);
            $qm012_jl_resbai     = self::jl_info($qm012_resbai,$nowarrbai->qm012);
            $qm012_jl_resshi     = self::jl_info($qm012_resshi,$nowarrshi->qm012);
            $qm012_jl_resge     = self::jl_info($qm012_resge,$nowarrge->qm012);
            for($a=0;$a<3;$a++){
                    if($a == $qm012_jl_res){
                        $qm012jlyl[$a+1] = 0;
                    }else{
                        $qm012jlyl[$a+1] += 1;
                    }

                    if($a == $qm012_jl_reswan){
                        $qm012jlylwan[$a+1] = 0;
                    }else{
                        $qm012jlylwan[$a+1] += 1;
                    }
                    if($a == $qm012_jl_resqian){
                        $qm012jlylqian[$a+1] = 0;
                    }else{
                        $qm012jlylqian[$a+1] += 1;
                    }
                    if($a == $qm012_jl_resbai){
                        $qm012jlylbai[$a+1] = 0;
                    }else{
                        $qm012jlylbai[$a+1] += 1;
                    }
                    if($a == $qm012_jl_resshi){
                        $qm012jlylshi[$a+1] = 0;
                    }else{
                        $qm012jlylshi[$a+1] += 1;
                    }
                    if($a == $qm012_jl_resge){
                        $qm012jlylge[$a+1] = 0;
                    }else{
                        $qm012jlylge[$a+1] += 1;
                    }
                }
            //012距离升降屏
            $qm012_jl_sjp_res  = self::sjp_info($qm012_jl_res,$nowarr->qm012jl);

            $qm012_jl_sjp_reswan  = self::sjp_info($qm012_jl_reswan,$nowarrwan->qm012jl);
            $qm012_jl_sjp_resqian  = self::sjp_info($qm012_jl_resqian,$nowarrqian->qm012jl);
            $qm012_jl_sjp_resbai  = self::sjp_info($qm012_jl_resbai,$nowarrbai->qm012jl);
            $qm012_jl_sjp_resshi  = self::sjp_info($qm012_jl_resshi,$nowarrshi->qm012jl);
            $qm012_jl_sjp_resge  = self::sjp_info($qm012_jl_resge,$nowarrge->qm012jl);
            for($a=1;$a<4;$a++){
                    if($a == $qm012_jl_sjp_res){
                        $qm012jlsjpyl[$a] = 0;
                    }else{
                        $qm012jlsjpyl[$a] += 1;
                    }

                    if($a == $qm012_jl_sjp_reswan){
                        $qm012jlsjpylwan[$a] = 0;
                    }else{
                        $qm012jlsjpylwan[$a] += 1;
                    }
                    if($a == $qm012_jl_sjp_resqian){
                        $qm012jlsjpylqian[$a] = 0;
                    }else{
                        $qm012jlsjpylqian[$a] += 1;
                    }
                    if($a == $qm012_jl_sjp_resbai){
                        $qm012jlsjpylbai[$a] = 0;
                    }else{
                        $qm012jlsjpylbai[$a] += 1;
                    }
                    if($a == $qm012_jl_sjp_resshi){
                        $qm012jlsjpylshi[$a] = 0;
                    }else{
                        $qm012jlsjpylshi[$a] += 1;
                    }
                    if($a == $qm012_jl_sjp_resge){
                        $qm012jlsjpylge[$a] = 0;
                    }else{
                        $qm012jlsjpylge[$a] += 1;
                    }
                }
            //012距离升降屏的升降屏
            $qm012_jl_sjp2_res   = self::sjp_info($qm012_jl_sjp_res,$nowarr->qm012jlsjp);

            $qm012_jl_sjp2_reswan   = self::sjp_info($qm012_jl_sjp_reswan,$nowarrwan->qm012jlsjp);
            $qm012_jl_sjp2_resqian   = self::sjp_info($qm012_jl_sjp_resqian,$nowarrqian->qm012jlsjp);
            $qm012_jl_sjp2_resbai   = self::sjp_info($qm012_jl_sjp_resbai,$nowarrbai->qm012jlsjp);
            $qm012_jl_sjp2_resshi   = self::sjp_info($qm012_jl_sjp_resshi,$nowarrshi->qm012jlsjp);
            $qm012_jl_sjp2_resge   = self::sjp_info($qm012_jl_sjp_resge,$nowarrge->qm012jlsjp);
            for($a=1;$a<4;$a++){
                if($a == $qm012_jl_sjp2_res){
                    $qm012jlsjp2yl[$a] = 0;
                }else{
                    $qm012jlsjp2yl[$a] += 1;
                }

                if($a == $qm012_jl_sjp2_reswan){
                        $qm012jlsjp2ylwan[$a] = 0;
                    }else{
                        $qm012jlsjp2ylwan[$a] += 1;
                    }
                    if($a == $qm012_jl_sjp2_resqian){
                        $qm012jlsjp2ylqian[$a] = 0;
                    }else{
                        $qm012jlsjp2ylqian[$a] += 1;
                    }
                    if($a == $qm012_jl_sjp2_resbai){
                        $qm012jlsjp2ylbai[$a] = 0;
                    }else{
                        $qm012jlsjp2ylbai[$a] += 1;
                    }
                    if($a == $qm012_jl_sjp2_resshi){
                        $qm012jlsjp2ylshi[$a] = 0;
                    }else{
                        $qm012jlsjp2ylshi[$a] += 1;
                    }
                    if($a == $qm012_jl_sjp2_resge){
                        $qm012jlsjp2ylge[$a] = 0;
                    }else{
                        $qm012jlsjp2ylge[$a] += 1;
                    }
                }

            //大中小
            $bigorsmall_res = self::bigorsmall($zuxuan_res[1]);

            $bigorsmall_reswan = self::bigorsmall($zuxuan_reswan[1]);
            $bigorsmall_resqian = self::bigorsmall($zuxuan_resqian[1]);
            $bigorsmall_resbai = self::bigorsmall($zuxuan_resbai[1]);
            $bigorsmall_resshi = self::bigorsmall($zuxuan_resshi[1]);
            $bigorsmall_resge = self::bigorsmall($zuxuan_resge[1]);
            for($a=0;$a<3;$a++){
                    if($a == $bigorsmall_res){
                        $dxyl[$a+1] = 0;
                    }else{
                        $dxyl[$a+1] += 1;
                    }

                    if($a == $bigorsmall_reswan){
                        $dxylwan[$a+1] = 0;
                    }else{
                        $dxylwan[$a+1] += 1;
                    }
                    if($a == $bigorsmall_resqian){
                        $dxylqian[$a+1] = 0;
                    }else{
                        $dxylqian[$a+1] += 1;
                    }
                    if($a == $bigorsmall_resbai){
                        $dxylbai[$a+1] = 0;
                    }else{
                        $dxylbai[$a+1] += 1;
                    }
                    if($a == $bigorsmall_resshi){
                        $dxylshi[$a+1] = 0;
                    }else{
                        $dxylshi[$a+1] += 1;
                    }
                    if($a == $bigorsmall_resge){
                        $dxylge[$a+1] = 0;
                    }else{
                        $dxylge[$a+1] += 1;
                    }
                }
            //大中小升降屏
            $bigorsmall_sjp_res = self::sjp_info($bigorsmall_res,$nowarr->dx);

            $bigorsmall_sjp_reswan = self::sjp_info($bigorsmall_reswan,$nowarrwan->dx);
            $bigorsmall_sjp_resqian = self::sjp_info($bigorsmall_resqian,$nowarrqian->dx);
            $bigorsmall_sjp_resbai = self::sjp_info($bigorsmall_resbai,$nowarrbai->dx);
            $bigorsmall_sjp_resshi = self::sjp_info($bigorsmall_resshi,$nowarrshi->dx);
            $bigorsmall_sjp_resge = self::sjp_info($bigorsmall_resge,$nowarrge->dx);
            for($a=1;$a<4;$a++){
                    if($a == $bigorsmall_sjp_res){
                        $dxsjpyl[$a] = 0;
                    }else{
                        $dxsjpyl[$a] += 1;
                    }

                    if($a == $bigorsmall_sjp_reswan){
                        $dxsjpylwan[$a] = 0;
                    }else{
                        $dxsjpylwan[$a] += 1;
                    }
                    if($a == $bigorsmall_sjp_resqian){
                        $dxsjpylqian[$a] = 0;
                    }else{
                        $dxsjpylqian[$a] += 1;
                    }
                    if($a == $bigorsmall_sjp_resbai){
                        $dxsjpylbai[$a] = 0;
                    }else{
                        $dxsjpylbai[$a] += 1;
                    }
                    if($a == $bigorsmall_sjp_resshi){
                        $dxsjpylshi[$a] = 0;
                    }else{
                        $dxsjpylshi[$a] += 1;
                    }
                    if($a == $bigorsmall_sjp_resge){
                        $dxsjpylge[$a] = 0;
                    }else{
                        $dxsjpylge[$a] += 1;
                    }
                }
            //大中小升降屏的升降屏
            $bigorsmall_sjp2_res = self::sjp_info($bigorsmall_sjp_res,$nowarr->dxsjp);

            $bigorsmall_sjp2_reswan = self::sjp_info($bigorsmall_sjp_reswan,$nowarrwan->dxsjp);
            $bigorsmall_sjp2_resqian = self::sjp_info($bigorsmall_sjp_resqian,$nowarrqian->dxsjp);
            $bigorsmall_sjp2_resbai = self::sjp_info($bigorsmall_sjp_resbai,$nowarrbai->dxsjp);
            $bigorsmall_sjp2_resshi = self::sjp_info($bigorsmall_sjp_resshi,$nowarrshi->dxsjp);
            $bigorsmall_sjp2_resge = self::sjp_info($bigorsmall_sjp_resge,$nowarrge->dxsjp);
            for($a=1;$a<4;$a++){
                    if($a == $bigorsmall_sjp2_res){
                        $dxsjp2yl[$a] = 0;
                    }else{
                        $dxsjp2yl[$a] += 1;
                    }

                    if($a == $bigorsmall_sjp2_reswan){
                        $dxsjp2ylwan[$a] = 0;
                    }else{
                        $dxsjp2ylwan[$a] += 1;
                    }
                    if($a == $bigorsmall_sjp2_resqian){
                        $dxsjp2ylqian[$a] = 0;
                    }else{
                        $dxsjp2ylqian[$a] += 1;
                    }
                    if($a == $bigorsmall_sjp2_resbai){
                        $dxsjp2ylbai[$a] = 0;
                    }else{
                        $dxsjp2ylbai[$a] += 1;
                    }
                    if($a == $bigorsmall_sjp2_resshi){
                        $dxsjp2ylshi[$a] = 0;
                    }else{
                        $dxsjp2ylshi[$a] += 1;
                    }
                    if($a == $bigorsmall_sjp2_resge){
                        $dxsjp2ylge[$a] = 0;
                    }else{
                        $dxsjp2ylge[$a] += 1;
                    }
                }
            //大中小距离
            $bigorsmall_jl_res   = self::jl_info($bigorsmall_res,$nowarr->dx);

            $bigorsmall_jl_reswan   = self::jl_info($bigorsmall_reswan,$nowarr->dx);
            $bigorsmall_jl_resqian   = self::jl_info($bigorsmall_resqian,$nowarr->dx);
            $bigorsmall_jl_resbai   = self::jl_info($bigorsmall_resbai,$nowarr->dx);
            $bigorsmall_jl_resshi   = self::jl_info($bigorsmall_resshi,$nowarr->dx);
            $bigorsmall_jl_resge   = self::jl_info($bigorsmall_resge,$nowarr->dx);
            for($a=0;$a<3;$a++){
                    if($a == $bigorsmall_jl_res){
                        $dxjlyl[$a+1] = 0;
                    }else{
                        $dxjlyl[$a+1] += 1;
                    }

                    if($a == $bigorsmall_jl_reswan){
                        $dxjlylwan[$a+1] = 0;
                    }else{
                        $dxjlylwan[$a+1] += 1;
                    }
                    if($a == $bigorsmall_jl_resqian){
                        $dxjlylqian[$a+1] = 0;
                    }else{
                        $dxjlylqian[$a+1] += 1;
                    }
                    if($a == $bigorsmall_jl_resbai){
                        $dxjlylbai[$a+1] = 0;
                    }else{
                        $dxjlylbai[$a+1] += 1;
                    }
                    if($a == $bigorsmall_jl_resshi){
                        $dxjlylshi[$a+1] = 0;
                    }else{
                        $dxjlylshi[$a+1] += 1;
                    }
                    if($a == $bigorsmall_jl_resge){
                        $dxjlylge[$a+1] = 0;
                    }else{
                        $dxjlylge[$a+1] += 1;
                    }
                }
            //大中小距离升降屏
            $bigorsmall_jl_sjp_res = self::sjp_info($bigorsmall_jl_res,$nowarr->dxjl);

            $bigorsmall_jl_sjp_reswan = self::sjp_info($bigorsmall_jl_reswan,$nowarrwan->dxjl);
            $bigorsmall_jl_sjp_resqian = self::sjp_info($bigorsmall_jl_resqian,$nowarrqian->dxjl);
            $bigorsmall_jl_sjp_resbai = self::sjp_info($bigorsmall_jl_resbai,$nowarrbai->dxjl);
            $bigorsmall_jl_sjp_resshi = self::sjp_info($bigorsmall_jl_resshi,$nowarrshi->dxjl);
            $bigorsmall_jl_sjp_resge = self::sjp_info($bigorsmall_jl_resge,$nowarrge->dxjl);
            for($a=1;$a<4;$a++){
                    if($a == $bigorsmall_jl_sjp_res){
                        $dxjlsjpyl[$a] = 0;
                    }else{
                        $dxjlsjpyl[$a] += 1;
                    }

                    if($a == $bigorsmall_jl_sjp_reswan){
                        $dxjlsjpylwan[$a] = 0;
                    }else{
                        $dxjlsjpylwan[$a] += 1;
                    }
                    if($a == $bigorsmall_jl_sjp_resqian){
                        $dxjlsjpylqian[$a] = 0;
                    }else{
                        $dxjlsjpylqian[$a] += 1;
                    }
                    if($a == $bigorsmall_jl_sjp_resbai){
                        $dxjlsjpylbai[$a] = 0;
                    }else{
                        $dxjlsjpylbai[$a] += 1;
                    }
                    if($a == $bigorsmall_jl_sjp_resshi){
                        $dxjlsjpylshi[$a] = 0;
                    }else{
                        $dxjlsjpylshi[$a] += 1;
                    }

                    if($a == $bigorsmall_jl_sjp_resge){
                        $dxjlsjpylge[$a] = 0;
                    }else{
                        $dxjlsjpylge[$a] += 1;
                    }
                }
           	//大中小距离升降屏的升降屏
            $bigorsmall_jl_sjp2_res = self::sjp_info($bigorsmall_jl_sjp_res,$nowarr->dxjlsjp);

            $bigorsmall_jl_sjp2_reswan = self::sjp_info($bigorsmall_jl_sjp_reswan,$nowarrwan->dxjlsjp);
            $bigorsmall_jl_sjp2_resqian = self::sjp_info($bigorsmall_jl_sjp_resqian,$nowarrqian->dxjlsjp);
            $bigorsmall_jl_sjp2_resbai = self::sjp_info($bigorsmall_jl_sjp_resbai,$nowarrbai->dxjlsjp);
            $bigorsmall_jl_sjp2_resshi = self::sjp_info($bigorsmall_jl_sjp_resshi,$nowarrshi->dxjlsjp);
            $bigorsmall_jl_sjp2_resge = self::sjp_info($bigorsmall_jl_sjp_resge,$nowarrge->dxjlsjp);
            
            for($a=1;$a<4;$a++){
                    if($a == $bigorsmall_jl_sjp2_res){
                        $dxjlsjp2yl[$a] = 0;
                    }else{
                        $dxjlsjp2yl[$a] += 1;
                    }

                    if($a == $bigorsmall_jl_sjp2_reswan){
                        $dxjlsjp2ylwan[$a] = 0;
                    }else{
                        $dxjlsjp2ylwan[$a] += 1;
                    }
                    if($a == $bigorsmall_jl_sjp2_resqian){
                        $dxjlsjp2ylqian[$a] = 0;
                    }else{
                        $dxjlsjp2ylqian[$a] += 1;
                    }
                    if($a == $bigorsmall_jl_sjp2_resbai){
                        $dxjlsjp2ylbai[$a] = 0;
                    }else{
                        $dxjlsjp2ylbai[$a] += 1;
                    }
                    if($a == $bigorsmall_jl_sjp2_resshi){
                        $dxjlsjp2ylshi[$a] = 0;
                    }else{
                        $dxjlsjp2ylshi[$a] += 1;
                    }
                    if($a == $bigorsmall_jl_sjp2_resge){
                        $dxjlsjp2ylge[$a] = 0;
                    }else{
                        $dxjlsjp2ylge[$a] += 1;
                    }
                }
            $expand_arrwan = array('zuxuan_val'=>$zuxuanvalwan,'sjp'=>$sjp_reswan,'sjpjl'=>$sjp_jl_reswan,'sjpjlsjp'=>$sjp_jl_sjp_reswan,'sjpjlsjp2'=>$sjp_jl_sjp2_reswan,'sjp2'=>$sjpdesjp_reswan,'jl'=>$jlinfo_reswan,'jlsjp'=>$jl_sjp_reswan,'jlsjpjl'=>$jl_sjp_jl_reswan,'jlsjpjlsjp'=>$jl_sjp_jl_sjp_reswan,'jlsjpjlsjp2'=>$jl_sjp_jl_sjp2_reswan,'jlsjp2'=>$jl_sjp2_reswan,'jl2'=>$jl2info_reswan,'jl2sjp'=>$jl2_sjp_reswan,'jl2sjp2'=>$jl2_sjp2_reswan,'jl3'=>$jl3info_reswan,'jl3sjp'=>$jl3_sjp_reswan,'jl3sjp2'=>$jl3_sjp2_reswan,'jl4'=>$jl4info_reswan,'jl4sjp'=>$jl4_sjp_reswan,'jl4sjp2'=>$jl4_sjp2_reswan,'qm012'=>$qm012_reswan,'qm012sjp'=>$qm012_sjp_reswan,'qm012sjp2'=>$qm012_sjp2_reswan,'qm012jl'=>$qm012_jl_reswan,'qm012jlsjp'=>$qm012_jl_sjp_reswan,'qm012jlsjp2'=>$qm012_jl_sjp2_reswan,'dx'=>$bigorsmall_reswan,'dxsjp'=>$bigorsmall_sjp_reswan,'dxsjp2'=>$bigorsmall_sjp2_reswan,'dxjl'=>$bigorsmall_jl_reswan,'dxjlsjp'=>$bigorsmall_jl_sjp_reswan,'dxjlsjp2'=>$bigorsmall_jl_sjp2_reswan,'one'=>$onewan,'sjpyl'=>$sjpylwan,'sjpjlyl'=>$sjpjlylwan,'sjpjlsjpyl'=>$sjpjlsjpylwan,'sjpjlsjp2yl'=>$sjpjlsjp2ylwan,'sjpyl2'=>$sjpyl2wan,'jlyl'=>$jlylwan,'jlsjpyl'=>$jlsjpylwan,'jlsjpjlyl'=>$jlsjpjlylwan,'jlsjpjlsjpyl'=>$jlsjpjlsjpylwan,'jlsjpjlsjp2yl'=>$jlsjpjlsjp2ylwan,'jlsjp2yl'=>$jlsjp2ylwan,'jl2yl'=>$jl2ylwan,'jl2sjpyl'=>$jl2sjpylwan,'jl2sjp2yl'=>$jl2sjp2ylwan,'jl3yl'=>$jl3ylwan,'jl3sjpyl'=>$jl3sjpylwan,'jl3sjp2yl'=>$jl3sjp2ylwan,'jl4yl'=>$jl4ylwan,'jl4sjpyl'=>$jl4sjpylwan,'jl4sjp2yl'=>$jl4sjp2ylwan,'qm012yl'=>$qm012ylwan,'qm012sjpyl'=>$qm012sjpylwan,'qm012sjp2yl'=>$qm012sjp2ylwan,'qm012jlyl'=>$qm012jlylwan,'qm012jlsjpyl'=>$qm012jlsjpylwan,'qm012jlsjp2yl'=>$qm012jlsjp2ylwan,'dxyl'=>$dxylwan,'dxsjpyl'=>$dxsjpylwan,'dxsjp2yl'=>$dxsjp2ylwan,'dxjlyl'=>$dxjlylwan,'dxjlsjpyl'=>$dxjlsjpylwan,'dxjlsjp2yl'=>$dxjlsjp2ylwan);

            $expand_arr = array('zuxuan_val'=>$zuxuanval,'sjp'=>$sjp_res,'sjpjl'=>$sjp_jl_res,'sjpjlsjp'=>$sjp_jl_sjp_res,'sjpjlsjp2'=>$sjp_jl_sjp2_res,'sjp2'=>$sjpdesjp_res,'jl'=>$jlinfo_res,'jlsjp'=>$jl_sjp_res,'jlsjpjl'=>$jl_sjp_jl_res,'jlsjpjlsjp'=>$jl_sjp_jl_sjp_res,'jlsjpjlsjp2'=>$jl_sjp_jl_sjp2_res,'jlsjp2'=>$jl_sjp2_res,'jl2'=>$jl2info_res,'jl2sjp'=>$jl2_sjp_res,'jl2sjp2'=>$jl2_sjp2_res,'jl3'=>$jl3info_res,'jl3sjp'=>$jl3_sjp_res,'jl3sjp2'=>$jl3_sjp2_res,'jl4'=>$jl4info_res,'jl4sjp'=>$jl4_sjp_res,'jl4sjp2'=>$jl4_sjp2_res,'qm012'=>$qm012_res,'qm012sjp'=>$qm012_sjp_res,'qm012sjp2'=>$qm012_sjp2_res,'qm012jl'=>$qm012_jl_res,'qm012jlsjp'=>$qm012_jl_sjp_res,'qm012jlsjp2'=>$qm012_jl_sjp2_res,'dx'=>$bigorsmall_res,'dxsjp'=>$bigorsmall_sjp_res,'dxsjp2'=>$bigorsmall_sjp2_res,'dxjl'=>$bigorsmall_jl_res,'dxjlsjp'=>$bigorsmall_jl_sjp_res,'dxjlsjp2'=>$bigorsmall_jl_sjp2_res,'one'=>$one,'sjpyl'=>$sjpyl,'sjpjlyl'=>$sjpjlyl,'sjpjlsjpyl'=>$sjpjlsjpyl,'sjpjlsjp2yl'=>$sjpjlsjp2yl,'sjpyl2'=>$sjpyl2,'jlyl'=>$jlyl,'jlsjpyl'=>$jlsjpyl,'jlsjpjlyl'=>$jlsjpjlyl,'jlsjpjlsjpyl'=>$jlsjpjlsjpyl,'jlsjpjlsjp2yl'=>$jlsjpjlsjp2yl,'jlsjp2yl'=>$jlsjp2yl,'jl2yl'=>$jl2yl,'jl2sjpyl'=>$jl2sjpyl,'jl2sjp2yl'=>$jl2sjp2yl,'jl3yl'=>$jl3yl,'jl3sjpyl'=>$jl3sjpyl,'jl3sjp2yl'=>$jl3sjp2yl,'jl4yl'=>$jl4yl,'jl4sjpyl'=>$jl4sjpyl,'jl4sjp2yl'=>$jl4sjp2yl,'qm012yl'=>$qm012yl,'qm012sjpyl'=>$qm012sjpyl,'qm012sjp2yl'=>$qm012sjp2yl,'qm012jlyl'=>$qm012jlyl,'qm012jlsjpyl'=>$qm012jlsjpyl,'qm012jlsjp2yl'=>$qm012jlsjp2yl,'dxyl'=>$dxyl,'dxsjpyl'=>$dxsjpyl,'dxsjp2yl'=>$dxsjp2yl,'dxjlyl'=>$dxjlyl,'dxjlsjpyl'=>$dxjlsjpyl,'dxjlsjp2yl'=>$dxjlsjp2yl);
            
            $expand_arrqian = array('zuxuan_val'=>$zuxuanvalqian,'sjp'=>$sjp_resqian,'sjpjl'=>$sjp_jl_resqian,'sjpjlsjp'=>$sjp_jl_sjp_resqian,'sjpjlsjp2'=>$sjp_jl_sjp2_resqian,'sjp2'=>$sjpdesjp_resqian,'jl'=>$jlinfo_resqian,'jlsjp'=>$jl_sjp_resqian,'jlsjpjl'=>$jl_sjp_jl_resqian,'jlsjpjlsjp'=>$jl_sjp_jl_sjp_resqian,'jlsjpjlsjp2'=>$jl_sjp_jl_sjp2_resqian,'jlsjp2'=>$jl_sjp2_resqian,'jl2'=>$jl2info_resqian,'jl2sjp'=>$jl2_sjp_resqian,'jl2sjp2'=>$jl2_sjp2_resqian,'jl3'=>$jl3info_resqian,'jl3sjp'=>$jl3_sjp_resqian,'jl3sjp2'=>$jl3_sjp2_resqian,'jl4'=>$jl4info_resqian,'jl4sjp'=>$jl4_sjp_resqian,'jl4sjp2'=>$jl4_sjp2_resqian,'qm012'=>$qm012_resqian,'qm012sjp'=>$qm012_sjp_resqian,'qm012sjp2'=>$qm012_sjp2_resqian,'qm012jl'=>$qm012_jl_resqian,'qm012jlsjp'=>$qm012_jl_sjp_resqian,'qm012jlsjp2'=>$qm012_jl_sjp2_resqian,'dx'=>$bigorsmall_resqian,'dxsjp'=>$bigorsmall_sjp_resqian,'dxsjp2'=>$bigorsmall_sjp2_resqian,'dxjl'=>$bigorsmall_jl_resqian,'dxjlsjp'=>$bigorsmall_jl_sjp_resqian,'dxjlsjp2'=>$bigorsmall_jl_sjp2_resqian,'one'=>$oneqian,'sjpyl'=>$sjpylqian,'sjpjlyl'=>$sjpjlylqian,'sjpjlsjpyl'=>$sjpjlsjpylqian,'sjpjlsjp2yl'=>$sjpjlsjp2ylqian,'sjpyl2'=>$sjpyl2qian,'jlyl'=>$jlylqian,'jlsjpyl'=>$jlsjpylqian,'jlsjpjlyl'=>$jlsjpjlylqian,'jlsjpjlsjpyl'=>$jlsjpjlsjpylqian,'jlsjpjlsjp2yl'=>$jlsjpjlsjp2ylqian,'jlsjp2yl'=>$jlsjp2ylqian,'jl2yl'=>$jl2ylqian,'jl2sjpyl'=>$jl2sjpylqian,'jl2sjp2yl'=>$jl2sjp2ylqian,'jl3yl'=>$jl3ylqian,'jl3sjpyl'=>$jl3sjpylqian,'jl3sjp2yl'=>$jl3sjp2ylqian,'jl4yl'=>$jl4ylqian,'jl4sjpyl'=>$jl4sjpylqian,'jl4sjp2yl'=>$jl4sjp2ylqian,'qm012yl'=>$qm012ylqian,'qm012sjpyl'=>$qm012sjpylqian,'qm012sjp2yl'=>$qm012sjp2ylqian,'qm012jlyl'=>$qm012jlylqian,'qm012jlsjpyl'=>$qm012jlsjpylqian,'qm012jlsjp2yl'=>$qm012jlsjp2ylqian,'dxyl'=>$dxylqian,'dxsjpyl'=>$dxsjpylqian,'dxsjp2yl'=>$dxsjp2ylqian,'dxjlyl'=>$dxjlylqian,'dxjlsjpyl'=>$dxjlsjpylqian,'dxjlsjp2yl'=>$dxjlsjp2ylqian);

            $expand_arrbai = array('zuxuan_val'=>$zuxuanvalbai,'sjp'=>$sjp_resbai,'sjpjl'=>$sjp_jl_resbai,'sjpjlsjp'=>$sjp_jl_sjp_resbai,'sjpjlsjp2'=>$sjp_jl_sjp2_resbai,'sjp2'=>$sjpdesjp_resbai,'jl'=>$jlinfo_resbai,'jlsjp'=>$jl_sjp_resbai,'jlsjpjl'=>$jl_sjp_jl_resbai,'jlsjpjlsjp'=>$jl_sjp_jl_sjp_resbai,'jlsjpjlsjp2'=>$jl_sjp_jl_sjp2_resbai,'jlsjp2'=>$jl_sjp2_resbai,'jl2'=>$jl2info_resbai,'jl2sjp'=>$jl2_sjp_resbai,'jl2sjp2'=>$jl2_sjp2_resbai,'jl3'=>$jl3info_resbai,'jl3sjp'=>$jl3_sjp_resbai,'jl3sjp2'=>$jl3_sjp2_resbai,'jl4'=>$jl4info_resbai,'jl4sjp'=>$jl4_sjp_resbai,'jl4sjp2'=>$jl4_sjp2_resbai,'qm012'=>$qm012_resbai,'qm012sjp'=>$qm012_sjp_resbai,'qm012sjp2'=>$qm012_sjp2_resbai,'qm012jl'=>$qm012_jl_resbai,'qm012jlsjp'=>$qm012_jl_sjp_resbai,'qm012jlsjp2'=>$qm012_jl_sjp2_resbai,'dx'=>$bigorsmall_resbai,'dxsjp'=>$bigorsmall_sjp_resbai,'dxsjp2'=>$bigorsmall_sjp2_resbai,'dxjl'=>$bigorsmall_jl_resbai,'dxjlsjp'=>$bigorsmall_jl_sjp_resbai,'dxjlsjp2'=>$bigorsmall_jl_sjp2_resbai,'one'=>$onebai,'sjpyl'=>$sjpylbai,'sjpjlyl'=>$sjpjlylbai,'sjpjlsjpyl'=>$sjpjlsjpylbai,'sjpjlsjp2yl'=>$sjpjlsjp2ylbai,'sjpyl2'=>$sjpyl2bai,'jlyl'=>$jlylbai,'jlsjpyl'=>$jlsjpylbai,'jlsjpjlyl'=>$jlsjpjlylbai,'jlsjpjlsjpyl'=>$jlsjpjlsjpylbai,'jlsjpjlsjp2yl'=>$jlsjpjlsjp2ylbai,'jlsjp2yl'=>$jlsjp2ylbai,'jl2yl'=>$jl2ylbai,'jl2sjpyl'=>$jl2sjpylbai,'jl2sjp2yl'=>$jl2sjp2ylbai,'jl3yl'=>$jl3ylbai,'jl3sjpyl'=>$jl3sjpylbai,'jl3sjp2yl'=>$jl3sjp2ylbai,'jl4yl'=>$jl4ylbai,'jl4sjpyl'=>$jl4sjpylbai,'jl4sjp2yl'=>$jl4sjp2ylbai,'qm012yl'=>$qm012ylbai,'qm012sjpyl'=>$qm012sjpylbai,'qm012sjp2yl'=>$qm012sjp2ylbai,'qm012jlyl'=>$qm012jlylbai,'qm012jlsjpyl'=>$qm012jlsjpylbai,'qm012jlsjp2yl'=>$qm012jlsjp2ylbai,'dxyl'=>$dxylbai,'dxsjpyl'=>$dxsjpylbai,'dxsjp2yl'=>$dxsjp2ylbai,'dxjlyl'=>$dxjlylbai,'dxjlsjpyl'=>$dxjlsjpylbai,'dxjlsjp2yl'=>$dxjlsjp2ylbai);

            $expand_arrshi = array('zuxuan_val'=>$zuxuanvalshi,'sjp'=>$sjp_resshi,'sjpjl'=>$sjp_jl_resshi,'sjpjlsjp'=>$sjp_jl_sjp_resshi,'sjpjlsjp2'=>$sjp_jl_sjp2_resshi,'sjp2'=>$sjpdesjp_resshi,'jl'=>$jlinfo_resshi,'jlsjp'=>$jl_sjp_resshi,'jlsjpjl'=>$jl_sjp_jl_resshi,'jlsjpjlsjp'=>$jl_sjp_jl_sjp_resshi,'jlsjpjlsjp2'=>$jl_sjp_jl_sjp2_resshi,'jlsjp2'=>$jl_sjp2_resshi,'jl2'=>$jl2info_resshi,'jl2sjp'=>$jl2_sjp_resshi,'jl2sjp2'=>$jl2_sjp2_resshi,'jl3'=>$jl3info_resshi,'jl3sjp'=>$jl3_sjp_resshi,'jl3sjp2'=>$jl3_sjp2_resshi,'jl4'=>$jl4info_resshi,'jl4sjp'=>$jl4_sjp_resshi,'jl4sjp2'=>$jl4_sjp2_resshi,'qm012'=>$qm012_resshi,'qm012sjp'=>$qm012_sjp_resshi,'qm012sjp2'=>$qm012_sjp2_resshi,'qm012jl'=>$qm012_jl_resshi,'qm012jlsjp'=>$qm012_jl_sjp_resshi,'qm012jlsjp2'=>$qm012_jl_sjp2_resshi,'dx'=>$bigorsmall_resshi,'dxsjp'=>$bigorsmall_sjp_resshi,'dxsjp2'=>$bigorsmall_sjp2_resshi,'dxjl'=>$bigorsmall_jl_resshi,'dxjlsjp'=>$bigorsmall_jl_sjp_resshi,'dxjlsjp2'=>$bigorsmall_jl_sjp2_resshi,'one'=>$oneshi,'sjpyl'=>$sjpylshi,'sjpjlyl'=>$sjpjlylshi,'sjpjlsjpyl'=>$sjpjlsjpylshi,'sjpjlsjp2yl'=>$sjpjlsjp2ylshi,'sjpyl2'=>$sjpyl2shi,'jlyl'=>$jlylshi,'jlsjpyl'=>$jlsjpylshi,'jlsjpjlyl'=>$jlsjpjlylshi,'jlsjpjlsjpyl'=>$jlsjpjlsjpylshi,'jlsjpjlsjp2yl'=>$jlsjpjlsjp2ylshi,'jlsjp2yl'=>$jlsjp2ylshi,'jl2yl'=>$jl2ylshi,'jl2sjpyl'=>$jl2sjpylshi,'jl2sjp2yl'=>$jl2sjp2ylshi,'jl3yl'=>$jl3ylshi,'jl3sjpyl'=>$jl3sjpylshi,'jl3sjp2yl'=>$jl3sjp2ylshi,'jl4yl'=>$jl4ylshi,'jl4sjpyl'=>$jl4sjpylshi,'jl4sjp2yl'=>$jl4sjp2ylshi,'qm012yl'=>$qm012ylshi,'qm012sjpyl'=>$qm012sjpylshi,'qm012sjp2yl'=>$qm012sjp2ylshi,'qm012jlyl'=>$qm012jlylshi,'qm012jlsjpyl'=>$qm012jlsjpylshi,'qm012jlsjp2yl'=>$qm012jlsjp2ylshi,'dxyl'=>$dxylshi,'dxsjpyl'=>$dxsjpylshi,'dxsjp2yl'=>$dxsjp2ylshi,'dxjlyl'=>$dxjlylshi,'dxjlsjpyl'=>$dxjlsjpylshi,'dxjlsjp2yl'=>$dxjlsjp2ylshi);

            $expand_arrge = array('zuxuan_val'=>$zuxuanvalge,'sjp'=>$sjp_resge,'sjpjl'=>$sjp_jl_resge,'sjpjlsjp'=>$sjp_jl_sjp_resge,'sjpjlsjp2'=>$sjp_jl_sjp2_resge,'sjp2'=>$sjpdesjp_resge,'jl'=>$jlinfo_resge,'jlsjp'=>$jl_sjp_resge,'jlsjpjl'=>$jl_sjp_jl_resge,'jlsjpjlsjp'=>$jl_sjp_jl_sjp_resge,'jlsjpjlsjp2'=>$jl_sjp_jl_sjp2_resge,'jlsjp2'=>$jl_sjp2_resge,'jl2'=>$jl2info_resge,'jl2sjp'=>$jl2_sjp_resge,'jl2sjp2'=>$jl2_sjp2_resge,'jl3'=>$jl3info_resge,'jl3sjp'=>$jl3_sjp_resge,'jl3sjp2'=>$jl3_sjp2_resge,'jl4'=>$jl4info_resge,'jl4sjp'=>$jl4_sjp_resge,'jl4sjp2'=>$jl4_sjp2_resge,'qm012'=>$qm012_resge,'qm012sjp'=>$qm012_sjp_resge,'qm012sjp2'=>$qm012_sjp2_resge,'qm012jl'=>$qm012_jl_resge,'qm012jlsjp'=>$qm012_jl_sjp_resge,'qm012jlsjp2'=>$qm012_jl_sjp2_resge,'dx'=>$bigorsmall_resge,'dxsjp'=>$bigorsmall_sjp_resge,'dxsjp2'=>$bigorsmall_sjp2_resge,'dxjl'=>$bigorsmall_jl_resge,'dxjlsjp'=>$bigorsmall_jl_sjp_resge,'dxjlsjp2'=>$bigorsmall_jl_sjp2_resge,'one'=>$onege,'sjpyl'=>$sjpylge,'sjpjlyl'=>$sjpjlylge,'sjpjlsjpyl'=>$sjpjlsjpylge,'sjpjlsjp2yl'=>$sjpjlsjp2ylge,'sjpyl2'=>$sjpyl2ge,'jlyl'=>$jlylge,'jlsjpyl'=>$jlsjpylge,'jlsjpjlyl'=>$jlsjpjlylge,'jlsjpjlsjpyl'=>$jlsjpjlsjpylge,'jlsjpjlsjp2yl'=>$jlsjpjlsjp2ylge,'jlsjp2yl'=>$jlsjp2ylge,'jl2yl'=>$jl2ylge,'jl2sjpyl'=>$jl2sjpylge,'jl2sjp2yl'=>$jl2sjp2ylge,'jl3yl'=>$jl3ylge,'jl3sjpyl'=>$jl3sjpylge,'jl3sjp2yl'=>$jl3sjp2ylge,'jl4yl'=>$jl4ylge,'jl4sjpyl'=>$jl4sjpylge,'jl4sjp2yl'=>$jl4sjp2ylge,'qm012yl'=>$qm012ylge,'qm012sjpyl'=>$qm012sjpylge,'qm012sjp2yl'=>$qm012sjp2ylge,'qm012jlyl'=>$qm012jlylge,'qm012jlsjpyl'=>$qm012jlsjpylge,'qm012jlsjp2yl'=>$qm012jlsjp2ylge,'dxyl'=>$dxylge,'dxsjpyl'=>$dxsjpylge,'dxsjp2yl'=>$dxsjp2ylge,'dxjlyl'=>$dxjlylge,'dxjlsjpyl'=>$dxjlsjpylge,'dxjlsjp2yl'=>$dxjlsjp2ylge);


            $expand     = json_encode($expand_arr);
            $expandwan  = json_encode($expand_arrwan);
            $expandqian = json_encode($expand_arrqian);
            $expandbai  = json_encode($expand_arrbai);
            $expandshi  = json_encode($expand_arrshi);
            $expandge   = json_encode($expand_arrge);

            Redis::command('HMSET', ['yilou', $eid, $expand]);
            Redis::command('HMSET', ['yilouwan', $eid, $expandwan]);
            Redis::command('HMSET', ['yilouqian', $eid, $expandqian]);
            Redis::command('HMSET', ['yiloubai', $eid, $expandbai]);
            Redis::command('HMSET', ['yiloushi', $eid, $expandshi]);
            Redis::command('HMSET', ['yilouge', $eid, $expandge]);
            Redis::command('HMSET', ['nowindex', 'big', $eid]);

            $nowindex    = Redis::hgetall('nowindex')['big'];

            $nowinfo     = Redis::hgetall('yilou')[$nowindex];
            $nowinfowan  = Redis::hgetall('yilouwan')[$nowindex];
            $nowinfoqian = Redis::hgetall('yilouqian')[$nowindex];
            $nowinfobai  = Redis::hgetall('yiloubai')[$nowindex];
            $nowinfoshi  = Redis::hgetall('yiloushi')[$nowindex];
            $nowinfoge   = Redis::hgetall('yilouge')[$nowindex];

            $nowarr      = json_decode($nowinfo);
            $nowarrwan   = json_decode($nowinfowan);
            $nowarrqian  = json_decode($nowinfoqian);
            $nowarrbai   = json_decode($nowinfobai);
            $nowarrshi   = json_decode($nowinfoshi);
            $nowarrge    = json_decode($nowinfoge);

			$nowarrs     = get_object_vars(json_decode($nowinfo));

            $nowarrswan  = get_object_vars(json_decode($nowinfowan));
            $nowarrsqian = get_object_vars(json_decode($nowinfoqian));
            $nowarrsbai  = get_object_vars(json_decode($nowinfobai));
            $nowarrsshi  = get_object_vars(json_decode($nowinfoshi));
            $nowarrsge   = get_object_vars(json_decode($nowinfoge));

            ${'zxtj'.$k}     = get_object_vars(json_decode(Redis::hgetall('zxtj')['zxtj'.$k])); 
            ${'zxtjwan'.$k}  = get_object_vars(json_decode(Redis::hgetall('zxtjwan')['zxtj'.$k])); 
            ${'zxtjqian'.$k} = get_object_vars(json_decode(Redis::hgetall('zxtjqian')['zxtj'.$k])); 
            ${'zxtjbai'.$k}  = get_object_vars(json_decode(Redis::hgetall('zxtjbai')['zxtj'.$k])); 
            ${'zxtjshi'.$k}  = get_object_vars(json_decode(Redis::hgetall('zxtjshi')['zxtj'.$k])); 
            ${'zxtjge'.$k}   = get_object_vars(json_decode(Redis::hgetall('zxtjge')['zxtj'.$k]));
                
    }
        //统计
        //出现次数 //组选
        for($na=1;$na<7;$na++){
            //................................................................0
           $zxtj_count[$na]    = array_count_values(${'zxtj'.$na})[0];
           $zxtj_zdyl[$na]     = max(${'zxtj'.$na});
           
           ${'zxtj1'.$na}      = array_merge(array_diff(${'zxtj'.$na}, array('0'))); //去除0
           ${'zxtj1'.$na.'sum'}= array_sum(${'zxtj1'.$na});
           $zxtj_pjyl[$na]     = round(${'zxtj1'.$na.'sum'}/count(${'zxtj1'.$na}));

           ${'zxtj2'.$na}      = array_keys(preg_grep("/^0/", ${'zxtj'.$na})); //键的数组
           $zxtj_zdlc[$na]     = self::zdlc(${'zxtj2'.$na});
        }

        for($na=1;$na<6;$na++){
            //................................................................0
           $zxtj_countwan[$na]  = array_count_values(${'zxtjwan'.$na})[0];
           $zxtj_countqian[$na] = array_count_values(${'zxtjqian'.$na})[0];
           $zxtj_countbai[$na]  = array_count_values(${'zxtjbai'.$na})[0];
           $zxtj_countshi[$na]  = array_count_values(${'zxtjshi'.$na})[0];
           $zxtj_countge[$na]   = array_count_values(${'zxtjge'.$na})[0];

           $zxtj_zdylwan[$na]   = max(${'zxtjwan'.$na});
           $zxtj_zdylqian[$na]  = max(${'zxtjqian'.$na});
           $zxtj_zdylbai[$na]   = max(${'zxtjbai'.$na});
           $zxtj_zdylshi[$na]   = max(${'zxtjshi'.$na});
           $zxtj_zdylge[$na]    = max(${'zxtjge'.$na});
           
           ${'zxtj1wan'.$na}    = array_merge(array_diff(${'zxtjwan'.$na}, array('0'))); //去除0
           ${'zxtj1qian'.$na}   = array_merge(array_diff(${'zxtjqian'.$na}, array('0'))); //去除0
           ${'zxtj1bai'.$na}    = array_merge(array_diff(${'zxtjbai'.$na}, array('0'))); //去除0
           ${'zxtj1shi'.$na}    = array_merge(array_diff(${'zxtjshi'.$na}, array('0'))); //去除0
           ${'zxtj1ge'.$na}     = array_merge(array_diff(${'zxtjge'.$na}, array('0'))); //去除0

           ${'zxtj1wan'.$na.'sum'}        = array_sum(${'zxtj1wan'.$na});
           ${'zxtj1qian'.$na.'sum'}       = array_sum(${'zxtj1qian'.$na});
           ${'zxtj1bai'.$na.'sum'}        = array_sum(${'zxtj1bai'.$na});
           ${'zxtj1shi'.$na.'sum'}        = array_sum(${'zxtj1shi'.$na});
           ${'zxtj1ge'.$na.'sum'}         = array_sum(${'zxtj1ge'.$na});

           $zxtj_pjylwan[$na]      = round(${'zxtj1wan'.$na.'sum'}/count(${'zxtj1wan'.$na}));
           $zxtj_pjylqian[$na]     = round(${'zxtj1qian'.$na.'sum'}/count(${'zxtj1qian'.$na}));
           $zxtj_pjylbai[$na]      = round(${'zxtj1bai'.$na.'sum'}/count(${'zxtj1bai'.$na}));
           $zxtj_pjylshi[$na]      = round(${'zxtj1shi'.$na.'sum'}/count(${'zxtj1shi'.$na}));
           $zxtj_pjylge[$na]       = round(${'zxtj1ge'.$na.'sum'}/count(${'zxtj1ge'.$na}));

           ${'zxtj2wan'.$na}       = array_keys(preg_grep("/^0/", ${'zxtjwan'.$na})); //键的数组
           ${'zxtj2qian'.$na}      = array_keys(preg_grep("/^0/", ${'zxtjqian'.$na})); //键的数组
           ${'zxtj2bai'.$na}       = array_keys(preg_grep("/^0/", ${'zxtjbai'.$na})); //键的数组
           ${'zxtj2shi'.$na}       = array_keys(preg_grep("/^0/", ${'zxtjshi'.$na})); //键的数组
           ${'zxtj2ge'.$na}        = array_keys(preg_grep("/^0/", ${'zxtjge'.$na})); //键的数组

           $zxtj_zdlcwan[$na]      = self::zdlc(${'zxtj2wan'.$na});
           $zxtj_zdlcqian[$na]     = self::zdlc(${'zxtj2qian'.$na});
           $zxtj_zdlcbai[$na]      = self::zdlc(${'zxtj2bai'.$na});
           $zxtj_zdlcshi[$na]      = self::zdlc(${'zxtj2shi'.$na});
           $zxtj_zdlcge[$na]       = self::zdlc(${'zxtj2ge'.$na});

        }
        
        //.............0
        $counts['zx120']     = $zxtj_count;
        $countswan['zx120']  = $zxtj_countwan;
        $countsqian['zx120'] = $zxtj_countqian;
        $countsbai['zx120']  = $zxtj_countbai;
        $countsshi['zx120']  = $zxtj_countshi;
        $countsge['zx120']   = $zxtj_countge;

        $zdyls ['zx120']     = $zxtj_zdyl;
        $zdylswan ['zx120']  = $zxtj_zdylwan;
        $zdylsqian ['zx120'] = $zxtj_zdylqian;
        $zdylsbai ['zx120']  = $zxtj_zdylbai;
        $zdylsshi ['zx120']  = $zxtj_zdylshi;
        $zdylsge ['zx120']   = $zxtj_zdylge;


        $pjyls ['zx120']     = $zxtj_pjyl;
        $pjylswan ['zx120']  = $zxtj_pjylwan;
        $pjylsqian ['zx120'] = $zxtj_pjylqian;
        $pjylsbai ['zx120']  = $zxtj_pjylbai;
        $pjylsshi ['zx120']  = $zxtj_pjylshi;
        $pjylsge ['zx120']   = $zxtj_pjylge;

        $zdlcs ['zx120']     = $zxtj_zdlc;
        $zdlcswan ['zx120']  = $zxtj_zdlcwan;
        $zdlcsqian ['zx120'] = $zxtj_zdlcqian;
        $zdlcsbai ['zx120']  = $zxtj_zdlcbai;
        $zdlcsshi ['zx120']  = $zxtj_zdlcshi;
        $zdlcsge ['zx120']   = $zxtj_zdlcge;

        $counttj            = json_encode($counts);
        $counttjwan         = json_encode($countswan);
        $counttjqian        = json_encode($countsqian);
        $counttjbai         = json_encode($countsbai);
        $counttjshi         = json_encode($countsshi);
        $counttjge          = json_encode($countsge);

        $zdyltj             = json_encode($zdyls);
        $zdyltjwan          = json_encode($zdylswan);
        $zdyltjqian         = json_encode($zdylsqian);
        $zdyltjbai          = json_encode($zdylsbai);
        $zdyltjshi          = json_encode($zdylsshi);
        $zdyltjge           = json_encode($zdylsge);

        $pjyltj             = json_encode($pjyls);
        $pjyltjwan          = json_encode($pjylswan);
        $pjyltjqian         = json_encode($pjylsqian);
        $pjyltjbai          = json_encode($pjylsbai);
        $pjyltjshi          = json_encode($pjylsshi);
        $pjyltjge           = json_encode($pjylsge);

        $zdlctj             = json_encode($zdlcs);
        $zdlctjwan          = json_encode($zdlcswan);
        $zdlctjqian         = json_encode($zdlcsqian);
        $zdlctjbai          = json_encode($zdlcsbai);
        $zdlctjshi          = json_encode($zdlcsshi);
        $zdlctjge           = json_encode($zdlcsge);
        

        Redis::command('HSET', ['tongji', 'count', $counttj]);
        Redis::command('HSET', ['tongjiwan', 'count', $counttjwan]);
        Redis::command('HSET', ['tongjiqian', 'count', $counttjqian]);
        Redis::command('HSET', ['tongjibai', 'count', $counttjbai]);
        Redis::command('HSET', ['tongjishi', 'count', $counttjshi]);
        Redis::command('HSET', ['tongjige', 'count', $counttjge]);

        Redis::command('HSET', ['tongji', 'zdyl', $zdyltj]);
        Redis::command('HSET', ['tongjiwan', 'zdyl', $zdyltjwan]);
        Redis::command('HSET', ['tongjiqian', 'zdyl', $zdyltjqian]);
        Redis::command('HSET', ['tongjibai', 'zdyl', $zdyltjbai]);
        Redis::command('HSET', ['tongjishi', 'zdyl', $zdyltjshi]);
        Redis::command('HSET', ['tongjige', 'zdyl', $zdyltjge]);

        Redis::command('HSET', ['tongji', 'pjyl', $pjyltj]);
        Redis::command('HSET', ['tongjiwan', 'pjyl', $pjyltjwan]);
        Redis::command('HSET', ['tongjiqian', 'pjyl', $pjyltjqian]);
        Redis::command('HSET', ['tongjibai', 'pjyl', $pjyltjbai]);
        Redis::command('HSET', ['tongjishi', 'pjyl', $pjyltjshi]);
        Redis::command('HSET', ['tongjige', 'pjyl', $pjyltjge]);

        Redis::command('HSET', ['tongji', 'zdlc', $zdlctj]);
        Redis::command('HSET', ['tongjiwan', 'zdlc', $zdlctjwan]);
        Redis::command('HSET', ['tongjiqian', 'zdlc', $zdlctjqian]);
        Redis::command('HSET', ['tongjibai', 'zdlc', $zdlctjbai]);
        Redis::command('HSET', ['tongjishi', 'zdlc', $zdlctjshi]);
        Redis::command('HSET', ['tongjige', 'zdlc', $zdlctjge]);


		$nowx = Redis::hgetall('nowindex')['big'];

		return $nowx;
	}

	//私有方法
	public function zuxuan120($array){
        //数组中数据出现次数的字符串
        $counts_str = implode(array_count_values($array));
        if(count($array) == 5 ){
            if($counts_str == '1211' || $counts_str == '1121' || $counts_str == '1112' || $counts_str == '2111'){
                $zuxuan_res[0] = '60';
                $zuxuan_res[1] = '2';
            }else if($counts_str == '212' || $counts_str == '221' || $counts_str == '122'){
                $zuxuan_res[0] = '30';
                $zuxuan_res[1] = '3';
            }else if($counts_str == '131' || $counts_str == '311' || $counts_str == '113'){
                $zuxuan_res[0] = '20';
                $zuxuan_res[1] = '4';
            }else if($counts_str == '32' || $counts_str == '23'){
                $zuxuan_res[0] = '10';
                $zuxuan_res[1] = '5';
            }else if($counts_str == '41' || $counts_str == '14' || $counts_str == '5'){
                $zuxuan_res[0] = '5';
                $zuxuan_res[1] = '6';
            }else{
                $zuxuan_res[0] = '120';
                $zuxuan_res[1] = '1';
            }
        }else if(count($array) == 4){
            if($counts_str == '121' || $counts_str == '112' || $counts_str == '211'){
                $zuxuan_res[0] = '12';
                $zuxuan_res[1] = '2';
            }else if($counts_str == '31' || $counts_str == '13'){
                $zuxuan_res[0] = '4';
                $zuxuan_res[1] = '4';
            }else if($counts_str == '22'){
                $zuxuan_res[0] = '6';
                $zuxuan_res[1] = '3';
            }else if($counts_str == '4'){
                $zuxuan_res[0] = '2';
                $zuxuan_res[1] = '5';
            }else{
                $zuxuan_res[0] = '24';
                $zuxuan_res[1] = '1';
            }
        }

        return $zuxuan_res;
    }


    public function sjp_info($now,$last){
        if($now == $last){
            $val = 2;
        }elseif($now<$last){
            $val = 1;
        }elseif($now>$last){
            $val = 3;
        }
        return $val;
    }

    public function jl_info($now,$last){
        return abs($now-$last); 
    }

    public function qm_info($rename){
        return ($rename%3);
    }

    public function bigorsmall($rename){
        if($rename == 1){
            return 0;
        }elseif($rename>=2 && $rename<=4){
            return 1;
        }elseif($rename>4){
            return 2;
        }
    }
    public function zdlc($a){ 
        sort($a);
       // print_r($a);
        $b[] = $a[0];
        $maxlen = 1;
        for($i = 1;$i<count($a);$i++){
            if(in_array(($a[$i]-1),$b)){
                $b[] = $a[$i];
                if(count($b)>$maxlen){
                    $maxlen = count($b);
                }   
            }
            else{
                $b = array();
                $b[] = $a[$i];
            }   
        }
        if($maxlen == 1){
            $maxlen = 0;
        }
        return $maxlen;
    }
}