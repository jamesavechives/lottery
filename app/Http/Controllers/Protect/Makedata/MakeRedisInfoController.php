<?php

namespace App\Http\Controllers\Protect\Makedata;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis as Redis;
use DB;
use Input;
class MakeRedisInfoController extends Controller{
    public function index($title,$begin,$count,$type){

        //链接redis
        $redis = Redis::connection('statarray');

        //获取redis中当前最大的值（最新期数） 没有设为 1
        //($redis->Get('thebig')) ? $big_index = $redis->Get('thebig') : $big_index = 68000;
        $big_index=$redis->Get('thebig');
        //68000
        while (
            $data =  DB::table($type)
                -> select('EID','QIHAO','WAN','QIAN','BAI','SHI','GE')
                -> where('EID', '=', $big_index++)
                -> get()
        ){
            /***********************************************
             *
             * 生成每一项当前的值
             *
             ************************************************/
            //获取开奖号
            $qihao              = $data[0]->WAN.$data[0]->QIAN.$data[0]->BAI.$data[0]->SHI.$data[0]->GE;
            //获取上一期开奖号
            $last_qihao         = self::last_qihao(($big_index-2),$type);
            //获取上二期开奖号
            $last2_qihao        = self::last_qihao(($big_index-3),$type);
            //获取上三期开奖号
            $last3_qihao        = self::last_qihao(($big_index-4),$type);
            //获取上四期开奖号
            $last4_qihao        = self::last_qihao(($big_index-5),$type);
            //获取上五期开奖号
            $last5_qihao        = self::last_qihao(($big_index-6),$type);
            //获取上六期开奖号
            $last6_qihao        = self::last_qihao(($big_index-7),$type);

            //获取本期静态数组所属值
            $first              = self::first($qihao,$title,$begin,$count);
            //上一期静态数组所属值
            $last_first         = self::first($last_qihao,$title,$begin,$count);
            //上二期静态数组所属值
            $last2_first        = self::first($last2_qihao,$title,$begin,$count);
            //上三期静态数组所属值
            $last3_first        = self::first($last3_qihao,$title,$begin,$count);
            //上四期静态数组所属值
            $last4_first        = self::first($last4_qihao,$title,$begin,$count);
            //上五期静态数组所属值
            $last5_first        = self::first($last5_qihao,$title,$begin,$count);
            //上六期静态数组所属值
            $last6_first        = self::first($last6_qihao,$title,$begin,$count);  //第一组列配置结束

            //升降平的值-$sjp_num
            $sjp_num            = self::sjp_info($first,$last_first);
            //上一期的升降平的值-$last_sjp_num
            $last_sjp_num       = self::sjp_info($last_first,$last2_first);
            //上二期的升降平的值-$last_sjp_num
            $last2_sjp_num      = self::sjp_info($last2_first,$last3_first);
            //上三期的升降平的值-$last_sjp_num
            $last3_sjp_num      = self::sjp_info($last3_first,$last4_first);
            //上四期的升降平的值-$last_sjp_num
            $last4_sjp_num      = self::sjp_info($last4_first,$last5_first);
            //升降平2的值
            $sjp2_num           = self::sjp_info($sjp_num,$last_sjp_num);

            //距离的值
            $jl_num             = self::jl_info($first,$last_first);
            //上一期的距离的值
            $last_jl_num        = self::jl_info($last_first,$last2_first);
            //上二期的距离的值
            $last2_jl_num       = self::jl_info($last2_first,$last3_first);
            //上三期的距离的值
            $last3_jl_num       = self::jl_info($last3_first,$last4_first);
            //上四期的距离的值
            $last4_jl_num       = self::jl_info($last4_first,$last5_first);
            //上五期的距离的值
            $last5_jl_num       = self::jl_info($last5_first,$last6_first);


            //距离2的值
            $jl2_num            = self::jl_info($jl_num,$last_jl_num);
            //上一期的距离2的值
            $last_jl2_num       = self::jl_info($last_jl_num,$last2_jl_num);
            //上二期的距离2的值
            $last2_jl2_num      = self::jl_info($last2_jl_num,$last3_jl_num);
            //上三期的距离2的值
            $last3_jl2_num      = self::jl_info($last3_jl_num,$last4_jl_num);
            //上四期的距离2的值
            $last4_jl2_num      = self::jl_info($last4_jl_num,$last5_jl_num);


            //距离3的值
            $jl3_num            = self::jl_info($jl2_num,$last_jl2_num);
            //上一期的距离3的值
            $last_jl3_num       = self::jl_info($last_jl2_num,$last2_jl2_num);
            //上二期的距离3的值
            $last2_jl3_num      = self::jl_info($last2_jl2_num,$last3_jl2_num);
            //上二期的距离3的值
            $last3_jl3_num      = self::jl_info($last3_jl2_num,$last4_jl2_num);


            //距离4的值
            $jl4_num            = self::jl_info($jl3_num,$last_jl3_num);
            //上一期的距离4的值
            $last_jl4_num       = self::jl_info($last_jl3_num,$last2_jl3_num);
            //上二期的距离4的值
            $last2_jl4_num      = self::jl_info($last2_jl3_num,$last3_jl3_num);


            //012的值-$qm_num //同三取模
            $qm_num             = self::qm_info($first);
            //上一个012的值-$qm_num //同三取模
            $last_qm_num        = self::qm_info($last_first);
            //上二个012的值-$qm_num //同三取模
            $last2_qm_num       = self::qm_info($last2_first);
            //上三个012的值-$qm_num //同三取模
            $last3_qm_num       = self::qm_info($last3_first);
            //012的距离
            $qm_jl_num          = self::jl_info($qm_num,$last_qm_num);
            //上一个012的距离
            $last_qm_jl_num     = self::jl_info($last_qm_num,$last2_qm_num);
            //上er个012的距离
            $last2_qm_jl_num    = self::jl_info($last2_qm_num,$last3_qm_num);

            //大中小的值-$dzx_num
            $dzx_num            = self::maxormin($first);
            //上一个大中小的值
            $last_dzx_num       = self::maxormin($last_first);
            //上er个大中小的值
            $last2_dzx_num      = self::maxormin($last2_first);
            //上er个大中小的值
            $last3_dzx_num      = self::maxormin($last3_first);
            //大中小的距离
            $dzx_jl_num         = self::jl_info($dzx_num,$last_dzx_num);
            //上一个大中小的距离
            $last_dzx_jl_num    = self::jl_info($last_dzx_num,$last2_dzx_num);
            //上er个大中小的距离
            $last2_dzx_jl_num   = self::jl_info($last2_dzx_num,$last3_dzx_num);

            //升降平的距离值
            $sjp_jl_num         = self::jl_info($sjp_num,$last_sjp_num);
            $last_sjp_jl_num    = self::jl_info($last_sjp_num,$last2_sjp_num);
            $last2_sjp_jl_num   = self::jl_info($last2_sjp_num,$last3_sjp_num);
            $last3_sjp_jl_num   = self::jl_info($last3_sjp_num,$last4_sjp_num);

            //升降平的距离的升降平
            $sjp_jl_sjp_num     = self::sjp_info($sjp_jl_num,$last_sjp_jl_num);
            $last_sjp_jl_sjp_num= self::sjp_info($last_sjp_jl_num,$last2_sjp_jl_num);

            //升降平的距离的升降平的升降屏
            $sjp_jl_sjp2_num    = self::sjp_info($sjp_jl_sjp_num,$last_sjp_jl_sjp_num);

            //升降平距离的距离
            $sjp_jl2_num        = self::jl_info($sjp_jl_num,$last_sjp_jl_num);
            $last_sjp_jl2_num   = self::jl_info($last_sjp_jl_num,$last2_sjp_jl_num);
            $last2_sjp_jl2_num  = self::jl_info($last2_sjp_jl_num,$last3_sjp_jl_num);

            //升降平距离的距离的升降平
            $sjp_jl2_sjp_num    = self::sjp_info($sjp_jl2_num,$last_sjp_jl2_num);
            $last_sjp_jl2_sjp_num= self::sjp_info($last_sjp_jl2_num,$last2_sjp_jl2_num);

            //升降平的距离的距离的升降平的升降屏
            $sjp_jl2_sjp2_num     = self::sjp_info($sjp_jl2_sjp_num,$last_sjp_jl2_sjp_num);

            //距离的升降平
            $jl_sjp_num         = self::sjp_info($jl_num,$last_jl_num);
            $last_jl_sjp_num    = self::sjp_info($last_jl_num,$last2_jl_num);
            $last2_jl_sjp_num   = self::sjp_info($last2_jl_num,$last3_jl_num);
            $last3_jl_sjp_num   = self::sjp_info($last3_jl_num,$last4_jl_num);
            $last4_jl_sjp_num   = self::sjp_info($last4_jl_num,$last5_jl_num);

            //距离的升降平2
            $jl_sjp2_num        = self::sjp_info($jl_sjp_num,$last_jl_sjp_num);

            //距离2的升降平
            $jl2_sjp_num        = self::sjp_info($jl2_num,$last_jl2_num);
            $last_jl2_sjp_num   = self::sjp_info($last_jl2_num,$last2_jl2_num);

            //距离2的升降平2
            $jl2_sjp2_num       = self::sjp_info($jl2_sjp_num,$last_jl2_sjp_num);

            //距离3的升降平
            $jl3_sjp_num        = self::sjp_info($jl3_num,$last_jl3_num);
            $last_jl3_sjp_num   = self::sjp_info($last_jl3_num,$last2_jl3_num);

            //距离3的升降平2
            $jl3_sjp2_num       = self::sjp_info($jl3_sjp_num,$last_jl3_sjp_num);

            //距离4的升降平
            $jl4_sjp_num        = self::sjp_info($jl4_num,$last_jl4_num);
            $last_jl4_sjp_num   = self::sjp_info($last_jl4_num,$last2_jl4_num);

            //距离4的升降平2
            $jl4_sjp2_num       = self::sjp_info($jl4_sjp_num,$last_jl4_sjp_num);

            //取模012的升降平
            $qm_sjp             = self::sjp_info($qm_num,$last_qm_num);
            $last_qm_sjp        = self::sjp_info($last_qm_num,$last2_qm_num);

            //取模012的升降平2
            $qm_sjp2            = self::sjp_info($qm_sjp,$last_qm_sjp);

            //取模012距离的升降平
            $qm_jl_sjp          = self::sjp_info($qm_jl_num,$last_qm_jl_num);
            $last_qm_jl_sjp     = self::sjp_info($last_qm_jl_num,$last2_qm_jl_num);

            //取模012距离的升降平
            $qm_jl_sjp2         = self::sjp_info($qm_jl_sjp,$last_qm_jl_sjp);


            //大中小的升降平
            $dzx_sjp            = self::sjp_info($dzx_num,$last_dzx_num);
            $last_dzx_sjp       = self::sjp_info($last_dzx_num,$last2_dzx_num);

            //大中小的升降平2
            $dzx_sjp2           = self::sjp_info($dzx_sjp,$last_dzx_sjp);

            //大中小距离的升降平
            $dzx_jl_sjp         = self::sjp_info($dzx_jl_num,$last_dzx_jl_num);
            $last_dzx_jl_sjp    = self::sjp_info($last_dzx_jl_num,$last2_dzx_jl_num);

            //大中小距离的升降平2
            $dzx_jl_sjp2        = self::sjp_info($dzx_jl_sjp,$last_dzx_jl_sjp);


            //距离升降平的距离
            $jl_sjp_jl_num      = self::jl_info($jl_sjp_num,$last_jl_sjp_num);
            $last_jl_sjp_jl_num = self::jl_info($last_jl_sjp_num,$last2_jl_sjp_num);
            $last2_jl_sjp_jl_num= self::jl_info($last2_jl_sjp_num,$last3_jl_sjp_num);
            $last3_jl_sjp_jl_num= self::jl_info($last3_jl_sjp_num,$last4_jl_sjp_num);

            //距离升降平的距离2
            $jl_sjp_jl2_num     = self::jl_info($jl_sjp_jl_num,$last_jl_sjp_jl_num);
            $last_jl_sjp_jl2_num= self::jl_info($last_jl_sjp_jl_num,$last2_jl_sjp_jl_num);
            $last2_jl_sjp_jl2_num= self::jl_info($last2_jl_sjp_jl_num,$last3_jl_sjp_jl_num);

            //距离升降平的距离的升降平
            $jl_sjp_jl_sjp_num  = self::sjp_info($jl_sjp_jl_num,$last_jl_sjp_jl_num);
            $last_jl_sjp_jl_sjp_num= self::sjp_info($last_jl_sjp_jl_num,$last2_jl_sjp_jl_num);

            //距离升降平的距离的升降平2
            $jl_sjp_jl_sjp2_num = self::sjp_info($jl_sjp_jl_sjp_num,$last_jl_sjp_jl_sjp_num);

            //距离升降平的距离2的升降平
            $jl_sjp_jl2_sjp_num = self::sjp_info($jl_sjp_jl2_num,$last_jl_sjp_jl2_num);
            $last_jl_sjp_jl2_sjp_num= self::sjp_info($last_jl_sjp_jl2_num,$last2_jl_sjp_jl2_num);

            //距离升降平的距离2的升降平2
            $jl_sjp_jl2_sjp2_num= self::sjp_info($jl_sjp_jl2_sjp_num,$last_jl_sjp_jl2_sjp_num);


            /***********************************************
             *
             * 生成每一项的统计值
             *
             ************************************************/
            //redis中的遗漏值
            if($redis -> hExists('yilou',$big_index-2)){
                $one                = get_object_vars(json_decode( $redis-> hGet('yilou',$big_index-2))->one);

                $sjp_arr            = get_object_vars(json_decode( $redis-> hGet('yilou',$big_index-2))->sjp_arr);
                $sjp2_arr           = get_object_vars(json_decode( $redis-> hGet('yilou',$big_index-2))->sjp2_arr);

                $sjp_jl_arr         = json_decode( $redis-> hGet('yilou',$big_index-2))->sjp_jl_arr;
                $sjp_jl_sjp_arr     = get_object_vars(json_decode( $redis-> hGet('yilou',$big_index-2))->sjp_jl_sjp_arr);
                $sjp_jl_sjp2_arr    = get_object_vars(json_decode( $redis-> hGet('yilou',$big_index-2))->sjp_jl_sjp2_arr);

                $sjp_jl2_arr        = json_decode( $redis-> hGet('yilou',$big_index-2))->sjp_jl2_arr;
                $sjp_jl2_sjp_arr    = get_object_vars(json_decode( $redis-> hGet('yilou',$big_index-2))->sjp_jl2_sjp_arr);
                $sjp_jl2_sjp2_arr   = get_object_vars(json_decode( $redis-> hGet('yilou',$big_index-2))->sjp_jl2_sjp2_arr);

                $jl_arr             = json_decode( $redis-> hGet('yilou',$big_index-2))->jl_arr;
                $jl_sjp_arr         = get_object_vars(json_decode( $redis-> hGet('yilou',$big_index-2))->jl_sjp_arr);
                $jl_sjp2_arr        = get_object_vars(json_decode( $redis-> hGet('yilou',$big_index-2))->jl_sjp2_arr);

                $jl_sjp_jl_arr      = json_decode( $redis-> hGet('yilou',$big_index-2))->jl_sjp_jl_arr;
                $jl_sjp_jl_sjp_arr  = get_object_vars(json_decode( $redis-> hGet('yilou',$big_index-2))->jl_sjp_jl_sjp_arr);
                $jl_sjp_jl_sjp2_arr = get_object_vars(json_decode( $redis-> hGet('yilou',$big_index-2))->jl_sjp_jl_sjp2_arr);

                $jl_sjp_jl2_arr     = json_decode( $redis-> hGet('yilou',$big_index-2))->jl_sjp_jl2_arr;
                $jl_sjp_jl2_sjp_arr = get_object_vars(json_decode( $redis-> hGet('yilou',$big_index-2))->jl_sjp_jl2_sjp_arr);
                $jl_sjp_jl2_sjp2_arr= get_object_vars(json_decode( $redis-> hGet('yilou',$big_index-2))->jl_sjp_jl2_sjp2_arr);

                $jl2_arr            = json_decode( $redis-> hGet('yilou',$big_index-2))->jl2_arr;
                $jl2_sjp_arr        = get_object_vars(json_decode( $redis-> hGet('yilou',$big_index-2))->jl2_sjp_arr);
                $jl2_sjp2_arr       = get_object_vars(json_decode( $redis-> hGet('yilou',$big_index-2))->jl2_sjp2_arr);

                $jl3_arr            = json_decode( $redis-> hGet('yilou',$big_index-2))->jl3_arr;
                $jl3_sjp_arr        = get_object_vars(json_decode( $redis-> hGet('yilou',$big_index-2))->jl3_sjp_arr);
                $jl3_sjp2_arr       = get_object_vars(json_decode( $redis-> hGet('yilou',$big_index-2))->jl3_sjp2_arr);

                $jl4_arr            = json_decode( $redis-> hGet('yilou',$big_index-2))->jl4_arr;
                $jl4_sjp_arr        = get_object_vars(json_decode( $redis-> hGet('yilou',$big_index-2))->jl4_sjp_arr);
                $jl4_sjp2_arr       = get_object_vars(json_decode( $redis-> hGet('yilou',$big_index-2))->jl4_sjp2_arr);

                $qm_012_arr         = json_decode( $redis-> hGet('yilou',$big_index-2))->qm_012_arr;
                $qm_012_sjp_arr     = get_object_vars(json_decode( $redis-> hGet('yilou',$big_index-2))->qm_012_sjp_arr);
                $qm_012_sjp2_arr    = get_object_vars(json_decode( $redis-> hGet('yilou',$big_index-2))->qm_012_sjp2_arr);

                $qm_012_jl_arr      = json_decode( $redis-> hGet('yilou',$big_index-2))->qm_012_jl_arr;
                $qm_012_jl_sjp_arr  = get_object_vars(json_decode( $redis-> hGet('yilou',$big_index-2))->qm_012_jl_sjp_arr);
                $qm_012_jl_sjp2_arr = get_object_vars(json_decode( $redis-> hGet('yilou',$big_index-2))->qm_012_jl_sjp2_arr);

                $dzx_arr            = json_decode( $redis-> hGet('yilou',$big_index-2))->dzx_arr;
                $dzx_sjp_arr        = get_object_vars(json_decode( $redis-> hGet('yilou',$big_index-2))->dzx_sjp_arr);
                $dzx_sjp2_arr       = get_object_vars(json_decode( $redis-> hGet('yilou',$big_index-2))->dzx_sjp2_arr);

                $dzx_jl_arr         = json_decode( $redis-> hGet('yilou',$big_index-2))->dzx_jl_arr;
                $dzx_jl_sjp_arr     = get_object_vars(json_decode( $redis-> hGet('yilou',$big_index-2))->dzx_jl_sjp_arr);
                $dzx_jl_sjp2_arr    = get_object_vars(json_decode( $redis-> hGet('yilou',$big_index-2))->dzx_jl_sjp2_arr);
            }else{
                $one                = array();

                $sjp_arr            = array();
                $sjp2_arr           = array();

                $sjp_jl_arr         = array();
                $sjp_jl_sjp_arr     = array();
                $sjp_jl_sjp2_arr    = array();

                $sjp_jl2_arr        = array();
                $sjp_jl2_sjp_arr    = array();
                $sjp_jl2_sjp2_arr   = array();

                $jl_arr             = array();
                $jl_sjp_arr         = array();
                $jl_sjp2_arr        = array();

                $jl_sjp_jl_arr      = array();
                $jl_sjp_jl_sjp_arr  = array();
                $jl_sjp_jl_sjp2_arr = array();

                $jl_sjp_jl2_arr     = array();
                $jl_sjp_jl2_sjp_arr = array();
                $jl_sjp_jl2_sjp2_arr= array();

                $jl2_arr            = array();
                $jl2_sjp_arr        = array();
                $jl2_sjp2_arr       = array();

                $jl3_arr            = array();
                $jl3_sjp_arr        = array();
                $jl3_sjp2_arr       = array();

                $jl4_arr            = array();
                $jl4_sjp_arr        = array();
                $jl4_sjp2_arr       = array();

                $qm_012_arr         = array();
                $qm_012_sjp_arr     = array();
                $qm_012_sjp2_arr    = array();

                $qm_012_jl_arr      = array();
                $qm_012_jl_sjp_arr  = array();
                $qm_012_jl_sjp2_arr = array();

                $dzx_arr            = array();
                $dzx_sjp_arr        = array();
                $dzx_sjp2_arr       = array();

                $dzx_jl_arr         = array();
                $dzx_jl_sjp_arr     = array();
                $dzx_jl_sjp2_arr    = array();
            }

            //生成新的遗漏值并替换
            $one_new                    = self::newylarr(1,($count+1),$one,$first);
            //升降平
            $sjp_arr_new                = self::newylarr(1,4,$sjp_arr,$sjp_num);
            $sjp2_arr_new               = self::newylarr(1,4,$sjp2_arr,$sjp2_num);
            //升降平距离
            $sjp_jl_arr_new             = self::newylarr(0,3,$sjp_jl_arr,$sjp_jl_num);
            //升降平距离的升降平
            $sjp_jl_sjp_arr_new         = self::newylarr(1,4,$sjp_jl_sjp_arr,$sjp_jl_sjp_num);
            $sjp_jl_sjp2_arr_new        = self::newylarr(1,4,$sjp_jl_sjp2_arr,$sjp_jl_sjp2_num);
            //升降平距离
            $sjp_jl2_arr_new            = self::newylarr(0,3,$sjp_jl2_arr,$sjp_jl2_num);
            //升降平距离的升降平
            $sjp_jl2_sjp_arr_new        = self::newylarr(1,4,$sjp_jl2_sjp_arr,$sjp_jl2_sjp_num);
            $sjp_jl2_sjp2_arr_new       = self::newylarr(1,4,$sjp_jl2_sjp2_arr,$sjp_jl2_sjp2_num);

            //距离1
            $jl_arr_new                 = self::newylarr(0,($count+1),$jl_arr,$jl_num);
            //距离升降平
            $jl_sjp_arr_new             = self::newylarr(1,4,$jl_sjp_arr,$jl_sjp_num);
            $jl_sjp2_arr_new            = self::newylarr(1,4,$jl_sjp2_arr,$jl_sjp2_num);
            //距离
            $jl_sjp_jl_arr_new          = self::newylarr(0,3,$jl_sjp_jl_arr,$jl_sjp_jl_num);
            //升降平
            $jl_sjp_jl_sjp_arr_new      = self::newylarr(1,4,$jl_sjp_jl_sjp_arr,$jl_sjp_jl_sjp_num);
            $jl_sjp_jl_sjp2_arr_new     = self::newylarr(1,4,$jl_sjp_jl_sjp2_arr,$jl_sjp_jl_sjp2_num);
            //距离
            $jl_sjp_jl2_arr_new         = self::newylarr(0,3,$jl_sjp_jl2_arr,$jl_sjp_jl2_num);
            //升降平
            $jl_sjp_jl2_sjp_arr_new     = self::newylarr(1,4,$jl_sjp_jl2_sjp_arr,$jl_sjp_jl2_sjp_num);
            $jl_sjp_jl2_sjp2_arr_new    = self::newylarr(1,4,$jl_sjp_jl2_sjp2_arr,$jl_sjp_jl2_sjp2_num);

            //距离2
            $jl2_arr_new                = self::newylarr(0,$count,$jl2_arr,$jl2_num);
            //升降平
            $jl2_sjp_arr_new            = self::newylarr(1,4,$jl2_sjp_arr,$jl2_sjp_num);
            $jl2_sjp2_arr_new           = self::newylarr(1,4,$jl2_sjp2_arr,$jl2_sjp2_num);
            //距离3
            $jl3_arr_new                = self::newylarr(0,$count,$jl3_arr,$jl3_num);
            //升降平
            $jl3_sjp_arr_new            = self::newylarr(1,4,$jl3_sjp_arr,$jl3_sjp_num);
            $jl3_sjp2_arr_new           = self::newylarr(1,4,$jl3_sjp2_arr,$jl3_sjp2_num);
            //距离4
            $jl4_arr_new                = self::newylarr(0,$count,$jl4_arr,$jl4_num);
            //升降平
            $jl4_sjp_arr_new            = self::newylarr(1,4,$jl4_sjp_arr,$jl4_sjp_num);
            $jl4_sjp2_arr_new           = self::newylarr(1,4,$jl4_sjp2_arr,$jl4_sjp2_num);
            //取模
            $qm_012_arr_new             = self::newylarr(0,3,$qm_012_arr,$qm_num);
            //升降平
            $qm_012_sjp_arr_new         = self::newylarr(1,4,$qm_012_sjp_arr,$qm_sjp);
            $qm_012_sjp2_arr_new        = self::newylarr(1,4,$qm_012_sjp2_arr,$qm_sjp2);
            //取模距离
            $qm_012_jl_arr_new          = self::newylarr(0,3,$qm_012_jl_arr,$qm_jl_num);
            //升降平
            $qm_012_jl_sjp_arr_new      = self::newylarr(1,4,$qm_012_jl_sjp_arr,$qm_jl_sjp);
            $qm_012_jl_sjp2_arr_new     = self::newylarr(1,4,$qm_012_jl_sjp2_arr,$qm_jl_sjp2);
            //大中小
            $dzx_arr_new                = self::newylarr(0,3,$dzx_arr,$dzx_num);

            $dzx_sjp_arr_new            = self::newylarr(1,4,$dzx_sjp_arr,$dzx_sjp);
            $dzx_sjp2_arr_new           = self::newylarr(1,4,$dzx_sjp2_arr,$dzx_sjp2);
            //大中小距离
            $dzx_jl_arr_new             = self::newylarr(0,3,$dzx_jl_arr,$dzx_jl_num);
            //升降平
            $dzx_jl_sjp_arr_new         = self::newylarr(1,4,$dzx_jl_sjp_arr,$dzx_jl_sjp);
            $dzx_jl_sjp2_arr_new        = self::newylarr(1,4,$dzx_jl_sjp2_arr,$dzx_jl_sjp2);

            /*******************************************
             *
             *需要统计总数最大平均的列值数组
             *
             ********************************************/
            self::tongji_info($one_new , 'first-list');
            self::tongji_info($sjp_arr_new , 'sjp-list');
            self::tongji_info($sjp2_arr_new , 'sjp2-list');
            self::tongji_info($jl_arr_new , 'jl-list');
            self::tongji_info($jl_sjp_arr_new , 'jl-sjp-list');
            self::tongji_info($jl_sjp2_arr_new , 'jl-sjp2-list');


            //格式化数据为json格式
            $expand_arr = array(
                'one'                   => $one_new,

                'one-count'             => self::tongji_finall_info($one_new,'first-list',1),
                'one-max'               => self::tongji_finall_info($one_new,'first-list',2),
                'one-pj-miss'           => self::tongji_finall_info($one_new,'first-list',3),
                'one-max-lc'            => self::tongji_finall_info($one_new,'first-list',4),

                'sjp_arr'               => $sjp_arr_new,

                'sjp-count'             => self::tongji_finall_info($sjp_arr_new , 'sjp-list',1),
                'sjp-max'               => self::tongji_finall_info($sjp_arr_new , 'sjp-list',2),
                'sjp-pj-miss'           => self::tongji_finall_info($sjp_arr_new , 'sjp-list',3),
                'sjp-max-lc'            => self::tongji_finall_info($sjp_arr_new , 'sjp-list',4),

                'sjp2_arr'              => $sjp2_arr_new,

                'sjp2-count'            => self::tongji_finall_info($sjp2_arr_new , 'sjp2-list' , 1),
                'sjp2-max'              => self::tongji_finall_info($sjp2_arr_new , 'sjp2-list' , 2),
                'sjp2-pj-miss'          => self::tongji_finall_info($sjp2_arr_new , 'sjp2-list' , 3),
                'sjp2-max-lc'           => self::tongji_finall_info($sjp2_arr_new , 'sjp2-list' , 4),

                'sjp_jl_arr'            => $sjp_jl_arr_new,
                'sjp_jl_sjp_arr'        => $sjp_jl_sjp_arr_new,
                'sjp_jl_sjp2_arr'       => $sjp_jl_sjp2_arr_new,
                'sjp_jl2_arr'           => $sjp_jl2_arr_new,
                'sjp_jl2_sjp_arr'       => $sjp_jl2_sjp_arr_new,
                'sjp_jl2_sjp2_arr'      => $sjp_jl2_sjp2_arr_new,

                'jl_arr'                => $jl_arr_new,

                'jl-count'              => self::tongji_finall_info($jl_arr_new , 'jl-list' , 1),
                'jl-max'                => self::tongji_finall_info($jl_arr_new , 'jl-list' , 2),
                'jl-pj-miss'            => self::tongji_finall_info($jl_arr_new , 'jl-list' , 3),
                'jl-max-lc'             => self::tongji_finall_info($jl_arr_new , 'jl-list' , 4),

                'jl_sjp_arr'            => $jl_sjp_arr_new,

                'jl-sjp-count'          => self::tongji_finall_info($jl_sjp_arr_new , 'jl-sjp-list' , 1),
                'jl-sjp-max'            => self::tongji_finall_info($jl_sjp_arr_new , 'jl-sjp-list' , 2),
                'jl-sjp-pj-miss'        => self::tongji_finall_info($jl_sjp_arr_new , 'jl-sjp-list' , 3),
                'jl-sjp-max-lc'         => self::tongji_finall_info($jl_sjp_arr_new , 'jl-sjp-list' , 4),

                'jl_sjp2_arr'           => $jl_sjp2_arr_new,

                'jl-sjp2-count'         => self::tongji_finall_info($jl_sjp2_arr_new , 'jl-sjp2-list' , 1),
                'jl-sjp2-max'           => self::tongji_finall_info($jl_sjp2_arr_new , 'jl-sjp2-list' , 2),
                'jl-sjp2-pj-miss'       => self::tongji_finall_info($jl_sjp2_arr_new , 'jl-sjp2-list' , 3),
                'jl-sjp2-max-lc'        => self::tongji_finall_info($jl_sjp2_arr_new , 'jl-sjp2-list' , 4),

                'jl_sjp_jl_arr'         => $jl_sjp_jl_arr_new,
                'jl_sjp_jl_sjp_arr'     => $jl_sjp_jl_sjp_arr_new,
                'jl_sjp_jl_sjp2_arr'    => $jl_sjp_jl_sjp2_arr_new,
                'jl_sjp_jl2_arr'        => $jl_sjp_jl2_arr_new,
                'jl_sjp_jl2_sjp_arr'    => $jl_sjp_jl2_sjp_arr_new,
                'jl_sjp_jl2_sjp2_arr'   => $jl_sjp_jl2_sjp2_arr_new,

                'jl2_arr'               => $jl2_arr_new,
                'jl2_sjp_arr'           => $jl2_sjp_arr_new,
                'jl2_sjp2_arr'          => $jl2_sjp2_arr_new,

                'jl3_arr'               => $jl3_arr_new,
                'jl3_sjp_arr'           => $jl3_sjp_arr_new,
                'jl3_sjp2_arr'          => $jl3_sjp2_arr_new,

                'jl4_arr'               => $jl4_arr_new,
                'jl4_sjp_arr'           => $jl4_sjp_arr_new,
                'jl4_sjp2_arr'          => $jl4_sjp2_arr_new,

                'qm_012_arr'            => $qm_012_arr_new,
                'qm_012_sjp_arr'        => $qm_012_sjp_arr_new,
                'qm_012_sjp2_arr'       => $qm_012_sjp2_arr_new,

                'qm_012_jl_arr'         => $qm_012_jl_arr_new,
                'qm_012_jl_sjp_arr'     => $qm_012_jl_sjp_arr_new,
                'qm_012_jl_sjp2_arr'    => $qm_012_jl_sjp2_arr_new,

                'dzx_arr'               => $dzx_arr_new,
                'dzx_sjp_arr'           => $dzx_sjp_arr_new,
                'dzx_sjp2_arr'          => $dzx_sjp2_arr_new,

                'dzx_jl_arr'            => $dzx_jl_arr_new,
                'dzx_jl_sjp_arr'        => $dzx_jl_sjp_arr_new,
                'dzx_jl_sjp2_arr'       => $dzx_jl_sjp2_arr_new,
                );
            $expand     = json_encode($expand_arr);
            //将数据插入redis中
            $redis  ->  hSet('yilou', $data[0]->EID, $expand);
            $redis  ->  Set('thebig', $big_index);

        }

        //print_r(json_decode($redis -> hGet('tongji_one','tj_one0')) -> one_tj_array);
        return $big_index;
    }

    // 取得上一期的期号方法
    public function last_qihao($qihao,$type){
        $data =  DB::table($type)
            -> select('EID','QIHAO','WAN','QIAN','BAI','SHI','GE')
            -> where('EID', '=', $qihao)
            -> get();
        $num_qh = $data[0]->WAN.$data[0]->QIAN.$data[0]->BAI.$data[0]->SHI.$data[0]->GE;

        return $num_qh;
    }

    // 返回数组第一序列值
    public function first($qihao,$title,$begin,$count){
        //链接redis--zst_set库
        $big_data_redis = Redis::connection('zst_set');

        //获取库里面的具体值
        for($i = $begin; $i <= $count; $i++){
            ${'array'.$i} = explode("," , json_decode($big_data_redis->hGet($title,$i))->info);
            //如果旗号属于该数组，返回数组所在的具体值，并跳出
            if(in_array($qihao,${'array'.$i})){
                $value = json_decode($big_data_redis->hGet($title,$i))->val;
                break;
            }
        }

        return $value;
    }

    public function tongji_info($need_arr,$redis_key){
        //链接redis
        $redis = Redis::connection('statarray');

        foreach($need_arr as $key=>$val){
            //取得之前的统计数据/没有设为空数组
            ($redis -> hExists($redis_key,'tj_'.$key)) ? $last_tongji_arr = json_decode($redis -> hGet($redis_key,'tj_'.$key)) -> tj_array : $last_tongji_arr = array();
            //将现在的新增到数组中
            array_push($last_tongji_arr,$val);

            /*
             * 配置数据，hash类型的redis数据 并新增
             * key：     $redis_key;
             * file:    'tj_'.$key...;
             * value:    $last_tongji_arr
             * */
            $tongji_arr = array('tj_array' => $last_tongji_arr);
            $tongji     = json_encode($tongji_arr);
            $redis      -> hSet($redis_key , 'tj_'.$key , $tongji);
        }
    }

    //
    public function tongji_finall_info($arr,$redis_key,$num){
        //链接redis
        $redis = Redis::connection('statarray');

        if($num == 1){
            foreach($arr as $key => $val){
                $final_arr          = json_decode($redis->hGet($redis_key,'tj_'.$key)) -> tj_array;
                //出现次数
                (array_key_exists(0,array_count_values($final_arr))) ? $count = array_count_values($final_arr)[0] : $count = 0;

                $count_array[$key]      = $count;
            }

            return $count_array;
        }elseif($num == 2){

            foreach($arr as $key => $val){

                $final_arr          = json_decode($redis->hGet($redis_key,'tj_'.$key)) -> tj_array;
                //最大遗漏
                $big_missing        = max($final_arr);

                $missing_array[$key]    = $big_missing;
            }

            return $missing_array;
        }elseif($num == 3){
            foreach($arr as $key => $val){
                $final_arr          = json_decode($redis->hGet($redis_key,'tj_'.$key)) -> tj_array;
                //平均遗漏
                $pj_missing         = round(array_sum(array_merge(array_diff($final_arr, array('0'))))/count($final_arr));
                $pj_missing_array[$key] = $pj_missing;
            }
            return $pj_missing_array;
        }elseif($num == 4){
            foreach($arr as $key => $val){

                $final_arr          = json_decode($redis->hGet($redis_key,'tj_'.$key)) -> tj_array;

                if(count(preg_grep("/^0/", $final_arr)) == 0){
                    $big_lc_array[$key] = 0;
                }else{
                    $big_lc             = self::zdlc(array_keys(preg_grep("/^0/", $final_arr)));

                    $big_lc_array[$key] = $big_lc;
                }
            }

            return $big_lc_array;
        }
    }

    // 返回升降平信息
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

    // 返回距离信息
    public function jl_info($now,$last){
        return abs($now-$last);
    }

    // 返回取模012信息
    public function qm_info($now){
        return ($now%3);
    }

    // 返回大中小的值
    public function maxormin($now){
        if($now == 1){
            return 0;//小
        }elseif($now>=2 && $now<=4){
            return 1;//中
        }elseif($now>4){
            return 2;//大
        }
    }

    // 返回新的遗漏值
    public function newylarr($begin,$end,$names,$same){
        for($a=$begin; $a<$end; $a++){
            if(empty($names[$a])){
                $names[$a]=0;
            }
            if($a == $same){
                $names[$a] = 0;
            }else{
                $names[$a] += 1;
            }
        }
        $news = $names;
        return $news;
    }

    // 返回最大遗漏值
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
