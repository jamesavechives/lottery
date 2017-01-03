<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis as Redis;
use DB;
use Input;
class TjqianController extends Controller{
    //第一个data skip的值为 总数的值 减去 需要统计的总条数 （1000/5000） 再减去 一
	public function data(){
        $tall     = count(DB::table('cqssc')->select('EID')->get());
        /*echo $tall;
        echo "<br>";*/
		$data     = DB::table('cqssc')
                    ->select('EID','QIHAO','WAN','QIAN','BAI','SHI','GE')
               	    ->orderBy('EID','asc')
                    ->skip(62251)
                    ->take(1000)
                    ->get();

        $last_data = DB::table('cqssc')
                    ->select('EID','QIHAO','WAN','QIAN','BAI','SHI','GE')
                    ->orderBy('EID','desc')
                    ->skip(1000+($tall-63251))
                    ->take(6)
                    ->get();
       
        
        $zero_number_arr   =array($last_data[0]->WAN,$last_data[0]->BAI,$last_data[0]->SHI,$last_data[0]->GE);
        $one_number_arr    =array($last_data[1]->WAN,$last_data[1]->BAI,$last_data[1]->SHI,$last_data[1]->GE);
        $two_number_arr    =array($last_data[2]->WAN,$last_data[2]->BAI,$last_data[2]->SHI,$last_data[2]->GE);
        $three_number_arr  =array($last_data[3]->WAN,$last_data[3]->BAI,$last_data[3]->SHI,$last_data[3]->GE);
        $four_number_arr   =array($last_data[4]->WAN,$last_data[4]->BAI,$last_data[4]->SHI,$last_data[4]->GE);
        $five_number_arr   =array($last_data[5]->WAN,$last_data[5]->BAI,$last_data[5]->SHI,$last_data[5]->GE);
        
        
        $dxjlsjp2yl=array(); $dxjlsjpyl =array(); $dxjlyl =array(); $dxsjp2yl = array(); $dxsjpyl=array(); $dxyl=array(); $qm012jlsjp2yl=array(); $qm012jlsjpyl=array();$qm012jlyl=array();$qm012sjp2yl=array();$qm012sjpyl=array();$qm012yl=array();$jl4sjp2yl=array();$jl4sjpyl=array();$jl4yl=array();$jl3sjp2yl=array();$jl3sjpyl=array(); $jl3yl=array(); $jl2sjp2yl=array();$jl2sjpyl=array();$jl2yl=array();$jlsjp2yl=array();$jlsjpyl=array();$jlyl=array();$sjpyl2 = array(); $sjpyl = array();$one = array();$jlsjpjlyl=array();
        $jlsjpjlsjpyl=array();$jlsjpjlsjp2yl=array(); $sjpjlyl=array();$sjpjlsjpyl=array();$sjpjlsjp2yl=array();
        $zxtj='zxtj';
        //组选120/组选24
        foreach ($data as $key => $value) {
            $number_arr = array($value->WAN,$value->BAI,$value->SHI,$value->GE);
            $eid = $value->EID;
            $qihao=$value->QIHAO;
            $number_str = $value->WAN.$value->BAI.$value->SHI.$value->GE;
            
            //开奖号码数组
            if($key == 0){
                $last_five_zuxuan_res   = self::zuxuan120($five_number_arr);  //上一 4  的组选值
                $last_four_zuxuan_res   = self::zuxuan120($four_number_arr);  //上一 4  的组选值
                $last_three_zuxuan_res  = self::zuxuan120($three_number_arr); //上一 3  的组选值
                $last_two_zuxuan_res    = self::zuxuan120($two_number_arr);   //上一 2  的组选值
                $last_one_zuxuan_res    = self::zuxuan120($one_number_arr);   //上一 1  的组选值
                $last_zero_zuxuan_res   = self::zuxuan120($zero_number_arr);  //上一 0  的组选值
                $zuxuan_res             = self::zuxuan120($number_arr);       //当前组选值
                /*for($a=1;$a<7;$a++){
                    if(empty($one[$a])){
                        $one[$a]=0;
                    }
                    if($a == $zuxuan_res[1]){
                        $one[$a] = 0;
                    }else{
                        $one[$a] += 1;
                    }
                }*/
                for($a=1;$a<6;$a++){
                    if(empty($one[$a])){
                        $one[$a]=0;
                    }
                    if($a == $zuxuan_res[1]){
                        $one[$a] = 0;
                    }else{
                        $one[$a] += 1;
                    }
                }
                foreach ($one as $key => $value) {
                   ${'zxtj'.$key}[]  = $value;
                }
                $zuxuanval = $zuxuan_res[1];  //组选120值
                $sjp_res              = self::sjp_info($zuxuan_res[1],$last_zero_zuxuan_res[1]);
                for($a=1;$a<4;$a++){
                    if(empty($sjpyl[$a])){
                        $sjpyl[$a]=0;
                    }
                    if($a == $sjp_res){
                        $sjpyl[$a] = 0;
                    }else{
                        $sjpyl[$a] += 1;
                    }
                }
                foreach ($sjpyl as $key => $value) {
                    ${'sjptj'.$key}[] = $value;
                }
                $last_zero_sjp_res    = self::sjp_info($last_zero_zuxuan_res[1],$last_one_zuxuan_res[1]);
                $last_one_sjp_res_c   = self::sjp_info($last_one_zuxuan_res[1],$last_two_zuxuan_res[1]);
                $last_two_sjp_res_c   = self::sjp_info($last_two_zuxuan_res[1],$last_three_zuxuan_res[1]);
                // 升降屏的距离
                $sjp_jl_res           = self::jl_info($sjp_res,$last_zero_sjp_res);
                $last_sjp_jl_res      = self::jl_info($last_zero_sjp_res,$last_one_sjp_res_c);
                $last2_sjp_jl_res     = self::jl_info($last_one_sjp_res_c,$last_two_sjp_res_c);
                $sjp_jl_arr[]         = $sjp_jl_res;
                for($a=0; $a<3; $a++){
                    if(empty($sjpjlyl[$a+1])){
                        $sjpjlyl[$a+1] = 0;
                    }
                    if($a == $sjp_jl_res){
                        $sjpjlyl[$a+1] = 0;
                    }else{
                        $sjpjlyl[$a+1] += 1;
                    }
                }
                foreach ($sjpjlyl as $key => $value) {
                   ${'sjpjltj'.$key}[] = $value;
                }
                // 升降屏的距离的升降屏
                $last_sjp_jl_sjp_res  = self::sjp_info($last_sjp_jl_res,$last2_sjp_jl_res);
                $sjp_jl_sjp_res       = self::sjp_info($sjp_jl_res,$last_sjp_jl_res);
                for($a=1; $a<4; $a++){
                    if(empty($sjpjlsjpyl[$a])){
                        $sjpjlsjpyl[$a] = 0;
                    }
                    if($a == $sjp_jl_sjp_res){
                        $sjpjlsjpyl[$a] = 0;
                    }else{
                        $sjpjlsjpyl[$a] += 1;
                    }
                }
                $sjp_jl_sjp_arr[]         = $sjp_jl_res;
                foreach ($sjpjlsjpyl as $key => $value) {
                    ${'sjpjlsjptj'.$key}[] = $value;
                }
                // 升降屏的距离的升降屏的升降屏
                $sjp_jl_sjp2_res      = self::sjp_info($sjp_jl_sjp_res,$last_sjp_jl_sjp_res);
                for($a=1; $a<4; $a++){
                    if(empty($sjpjlsjp2yl[$a])){
                        $sjpjlsjp2yl[$a] = 0;
                    }
                    if($a == $sjp_jl_sjp2_res){
                        $sjpjlsjp2yl[$a] = 0;
                    }else{
                        $sjpjlsjp2yl[$a] += 1;
                    }
                }
                foreach ($sjpjlsjp2yl as $key => $value) {
                    ${'sjpjlsjp2tj'.$key}[] = $value;
                }

                $sjp_arr[]            = $sjp_res;
                $sjpdesjp_res         = self::sjp_info($sjp_res,$last_zero_sjp_res);
                for($a=1;$a<4;$a++){
                    if(empty($sjpyl2[$a])){
                        $sjpyl2[$a]=0;
                    }
                    if($a == $sjpdesjp_res){
                        $sjpyl2[$a] = 0;
                    }else{
                        $sjpyl2[$a] += 1;
                    }
                }
                foreach ($sjpyl2 as $key => $value) {
                    ${'sjp2tj'.$key}[] = $value;
                }
                $jlinfo_res              = self::jl_info($zuxuan_res[1],$last_zero_zuxuan_res[1]);
                $last_zero_jl1info_res   = self::jl_info($last_zero_zuxuan_res[1],$last_one_zuxuan_res[1]);  //0jl
                $last_one_jl1info_res    = self::jl_info($last_one_zuxuan_res[1],$last_two_zuxuan_res[1]);   //1jl
                $last_two_jl1info_res    = self::jl_info($last_two_zuxuan_res[1],$last_three_zuxuan_res[1]); //2jl
                $last_three_jl1info_res  = self::jl_info($last_three_zuxuan_res[1],$last_four_zuxuan_res[1]);//3jl
                $last_four_jl1info_res   = self::jl_info($last_four_zuxuan_res[1],$last_five_zuxuan_res[1]); //4jl
                //距离的距离
                $last_zero_jl2info_res   = self::jl_info($last_zero_jl1info_res,$last_one_jl1info_res);   //0jl2
                $last_one_jl2info_res    = self::jl_info($last_one_jl1info_res,$last_two_jl1info_res);    //1jl2
                $last_two_jl2info_res    = self::jl_info($last_two_jl1info_res,$last_three_jl1info_res);  //2jl2
                $last_three_jl2info_res  = self::jl_info($last_three_jl1info_res,$last_four_jl1info_res);  //3jl2
                $jl2info_res             = self::jl_info($jlinfo_res,$last_zero_jl1info_res);
                //距离的距离的距离
                $last_zero_jl3info_res   = self::jl_info($last_zero_jl2info_res,$last_one_jl2info_res);    //0jl3
                $last_one_jl3info_res    = self::jl_info($last_one_jl2info_res,$last_two_jl2info_res);     //1jl3
                $last_two_jl3info_res    = self::jl_info($last_two_jl2info_res,$last_three_jl2info_res);   //2jl3
                $jl3info_res             = self::jl_info($jl2info_res ,$last_zero_jl2info_res);
                //距离的距离的距离
                $last_zero_jl4info_res   = self::jl_info($last_zero_jl3info_res,$last_one_jl3info_res);    //0jl4
                $last_one_jl4info_res    = self::jl_info($last_one_jl3info_res,$last_two_jl3info_res);    //0jl4
                $jl4info_res             = self::jl_info($jl3info_res ,$last_zero_jl3info_res);

                $jlinfo_arr[]            = $jlinfo_res; 
                /*for($a=0;$a<6;$a++){
                    if(empty($jlyl[$a+1])){
                        $jlyl[$a+1]=0;
                    }
                    if($a == $jlinfo_res){
                        $jlyl[$a+1] = 0;
                    }else{
                        $jlyl[$a+1] += 1;
                    }
                }*/
                for($a=0;$a<5;$a++){
                    if(empty($jlyl[$a+1])){
                        $jlyl[$a+1]=0;
                    }
                    if($a == $jlinfo_res){
                        $jlyl[$a+1] = 0;
                    }else{
                        $jlyl[$a+1] += 1;
                    }
                }
                foreach ($jlyl as $key => $value) {
                    ${'jltj'.$key}[] = $value;
                }
                //距离的升降屏
                $jl_sjp_res              = self::sjp_info($jlinfo_res,$last_zero_jl1info_res);
                $jl_sjp_arr[]            = $jl_sjp_res;
                for($a=1;$a<4;$a++){
                    if(empty($jlsjpyl[$a])){
                        $jlsjpyl[$a]=0;
                    }
                    if($a == $jl_sjp_res){
                        $jlsjpyl[$a] = 0;
                    }else{
                        $jlsjpyl[$a] += 1;
                    }
                }
                foreach ($jlsjpyl as $key => $value) {
                    ${'jlsjptj'.$key}[] = $value;
                }

                //距离升降屏的距离
                $last3_jl_sjp_res        = self::sjp_info($last_two_jl1info_res,$last_three_jl1info_res);
                $last2_jl_sjp_res        = self::sjp_info($last_one_jl1info_res,$last_two_jl1info_res);
                $last_jl_sjp_res         = self::sjp_info($last_zero_jl1info_res,$last_one_jl1info_res);
                $jl_sjp_jl_res           = self::jl_info($jl_sjp_res,$last_jl_sjp_res);

                $last_jl_sjp_jl_res      = self::jl_info($last_jl_sjp_res,$last2_jl_sjp_res);
                $last2_jl_sjp_jl_res     = self::jl_info($last2_jl_sjp_res,$last3_jl_sjp_res);
                $jl_sjp_jl_arr[]         = $jl_sjp_jl_res;
                for($a=0;$a<3;$a++){
                    if(empty($jlsjpjlyl[$a+1])){
                        $jlsjpjlyl[$a+1]=0;
                    }
                    if($a == $jl_sjp_jl_res){
                        $jlsjpjlyl[$a+1] = 0;
                    }else{
                        $jlsjpjlyl[$a+1] += 1;
                    }
                }
                foreach ($jlsjpjlyl as $key => $value) {
                     ${'jlsjpjltj'.$key}[] = $value;
                }
                //距离升降屏的距离的升降屏
                $last_jl_sjp_jl_sjp_res   = self::sjp_info($last_jl_sjp_jl_res,$last2_jl_sjp_jl_res);
                $jl_sjp_jl_sjp_res        = self::sjp_info($jl_sjp_jl_res,$last_jl_sjp_jl_res);
                $jl_sjp_jl_sjp_arr[]      = $jl_sjp_jl_sjp_res;
                for($a=1; $a<4; $a++){
                    if(empty($jlsjpjlsjpyl[$a])){
                        $jlsjpjlsjpyl[$a] = 0;
                    }
                    if($a == $jl_sjp_jl_sjp_res){
                        $jlsjpjlsjpyl[$a] = 0;
                    }else{
                        $jlsjpjlsjpyl[$a] += 1;
                    }
                }
                foreach ($jlsjpjlsjpyl as $key => $value) {
                    ${'jlsjpjlsjptj'.$key}[] = $value;
                }
                $jl_sjp_jl_sjp2_res        = self::sjp_info($jl_sjp_jl_sjp_res,$last_jl_sjp_jl_sjp_res);
                for($a=1; $a<4; $a++){
                    if(empty($jlsjpjlsjp2yl[$a])){
                        $jlsjpjlsjp2yl[$a] = 0;
                    }
                    if($a == $jl_sjp_jl_sjp2_res){
                        $jlsjpjlsjp2yl[$a] = 0;
                    }else{
                        $jlsjpjlsjp2yl[$a] += 1;
                    }
                }
                foreach ($jlsjpjlsjp2yl as $key => $value) {
                    ${'jlsjpjlsjp2tj'.$key}[] = $value;
                }
                //距离的升降屏的升降屏
                //$last_jl_sjp_res         = self::sjp_info($last_zero_jl1info_res,$last_one_jl1info_res);
                $jl_sjp2_res             = self::sjp_info($jl_sjp_res,$last_jl_sjp_res);
                $jl_sjp2_arr[]           = $jl_sjp2_res;
                for($a=1;$a<4;$a++){
                    if(empty($jlsjp2yl[$a])){
                        $jlsjp2yl[$a]=0;
                    }
                    if($a == $jl_sjp2_res){
                        $jlsjp2yl[$a] = 0;
                    }else{
                        $jlsjp2yl[$a] += 1;
                    }
                }
                foreach ($jlsjp2yl as $key => $value) {
                    ${'jlsjp2tj'.$key}[] = $value;
                }
                //距离2
                $jl2info_arr[]           = $jl2info_res; 
                /*for($a=0;$a<5;$a++){
                    if(empty($jl2yl[$a+1])){
                        $jl2yl[$a+1]=0;
                    }
                    if($a == $jl2info_res){
                        $jl2yl[$a+1] = 0;
                    }else{
                        $jl2yl[$a+1] += 1;
                    }
                }*/
                for($a=0;$a<4;$a++){
                    if(empty($jl2yl[$a+1])){
                        $jl2yl[$a+1]=0;
                    }
                    if($a == $jl2info_res){
                        $jl2yl[$a+1] = 0;
                    }else{
                        $jl2yl[$a+1] += 1;
                    }
                }
                foreach ($jl2yl as $key => $value) {
                    ${'jl2tj'.$key}[] = $value;
                }
                //距离的距离升降屏
                $jl2_sjp_res              = self::sjp_info($jl2info_res,$last_zero_jl2info_res);
                $jl2_sjp_arr[]            = $jl2_sjp_res;
                for($a=1;$a<4;$a++){
                    if(empty($jl2sjpyl[$a])){
                       $jl2sjpyl[$a]=0;
                    }
                    if($a == $jl2_sjp_res){
                        $jl2sjpyl[$a] = 0;
                    }else{
                        $jl2sjpyl[$a] += 1;
                    }
                }
                foreach ($jl2sjpyl as $key => $value) {
                    ${'jl2sjptj'.$key}[] = $value;
                }
                //距离的距离升降屏的升降屏
                $last_jl2_sjp_res         = self::sjp_info($last_zero_jl2info_res,$last_one_jl2info_res);
                $jl2_sjp2_res             = self::sjp_info($jl2_sjp_res,$last_jl2_sjp_res);
                $jl2_sjp2_arr[]           = $jl2_sjp2_res;
                for($a=1;$a<4;$a++){
                    if(empty($jl2sjp2yl[$a])){
                        $jl2sjp2yl[$a]=0;
                    }
                    if($a == $jl2_sjp2_res){
                        $jl2sjp2yl[$a] = 0;
                    }else{
                        $jl2sjp2yl[$a] += 1;
                    }
                }
                foreach ($jl2sjp2yl as $key => $value) {
                    ${'jl2sjp2tj'.$key}[] = $value;
                }
                //距离3
                $jl3info_arr[]           = $jl3info_res; 
                /*for($a=0;$a<4;$a++){
                    if(empty($jl3yl[$a+1])){
                        $jl3yl[$a+1]=0;
                    }
                    if($a == $jl3info_res){
                        $jl3yl[$a+1] = 0;
                    }else{
                        $jl3yl[$a+1] += 1;
                    }
                }*/
                for($a=0;$a<3;$a++){
                    if(empty($jl3yl[$a+1])){
                        $jl3yl[$a+1]=0;
                    }
                    if($a == $jl3info_res){
                        $jl3yl[$a+1] = 0;
                    }else{
                        $jl3yl[$a+1] += 1;
                    }
                }
                foreach ($jl3yl as $key => $value) {
                    ${'jl3tj'.$key}[] = $value;
                }
                //距离的距离升降屏
                $jl3_sjp_res              = self::sjp_info($jl3info_res,$last_zero_jl3info_res);
                $jl3_sjp_arr[]            = $jl3_sjp_res;
                for($a=1;$a<4;$a++){
                    if(empty($jl3sjpyl[$a])){
                        $jl3sjpyl[$a]=0;
                    }
                    if($a == $jl3_sjp_res){
                        $jl3sjpyl[$a] = 0;
                    }else{
                        $jl3sjpyl[$a] += 1;
                    }
                }
                foreach ($jl3sjpyl as $key => $value) {
                    ${'jl3sjptj'.$key}[] = $value;
                }
                //距离的距离升降屏的升降屏
                $last_jl3_sjp_res         = self::sjp_info($last_zero_jl3info_res,$last_one_jl3info_res);
                $jl3_sjp2_res             = self::sjp_info($jl3_sjp_res,$last_jl3_sjp_res);
                $jl3_sjp2_arr[]           = $jl3_sjp2_res;
                for($a=1;$a<4;$a++){
                    if(empty($jl3sjp2yl[$a])){
                        $jl3sjp2yl[$a]=0;
                    }
                    if($a == $jl3_sjp2_res){
                        $jl3sjp2yl[$a] = 0;
                    }else{
                        $jl3sjp2yl[$a] += 1;
                    }
                }
                foreach ($jl3sjp2yl as $key => $value) {
                    ${'jl3sjp2tj'.$key}[] = $value;
                }
                //距离4
                $jl4info_arr[]           = $jl4info_res; 
                /*for($a=0;$a<3;$a++){
                    if(empty($jl4yl[$a+1])){
                        $jl4yl[$a+1]=0;
                    }
                    if($a == $jl4info_res){
                        $jl4yl[$a+1] = 0;
                    }else{
                        $jl4yl[$a+1] += 1;
                    }
                }*/
                for($a=0;$a<2;$a++){
                    if(empty($jl4yl[$a+1])){
                        $jl4yl[$a+1]=0;
                    }
                    if($a == $jl4info_res){
                        $jl4yl[$a+1] = 0;
                    }else{
                        $jl4yl[$a+1] += 1;
                    }
                }
                foreach ($jl4yl as $key => $value) {
                    ${'jl4tj'.$key}[] = $value;
                }

                //距离的距离升降屏
                $jl4_sjp_res              = self::sjp_info($jl4info_res,$last_zero_jl4info_res);
                $jl4_sjp_arr[]            = $jl4_sjp_res;
                for($a=1;$a<4;$a++){
                    if(empty($jl4sjpyl[$a])){
                        $jl4sjpyl[$a]=0;
                    }
                    if($a == $jl4_sjp_res){
                        $jl4sjpyl[$a] = 0;
                    }else{
                        $jl4sjpyl[$a] += 1;
                    }
                }
                foreach ($jl4sjpyl as $key => $value) {
                    ${'jl4sjptj'.$key}[] = $value;
                }
                //距离的距离升降屏的升降屏
                $last_jl4_sjp_res         = self::sjp_info($last_zero_jl4info_res,$last_one_jl4info_res);
                $jl4_sjp2_res             = self::sjp_info($jl4_sjp_res,$last_jl4_sjp_res);
                $jl4_sjp2_arr[]           = $jl4_sjp2_res;
                for($a=1;$a<4;$a++){
                    if(empty($jl4sjp2yl[$a])){
                        $jl4sjp2yl[$a]=0;
                    }
                    if($a == $jl4_sjp2_res){
                        $jl4sjp2yl[$a] = 0;
                    }else{
                        $jl4sjp2yl[$a] += 1;
                    }
                }
                foreach ($jl4sjp2yl as $key => $value) {
                    ${'jl4sjp2tj'.$key}[] = $value;
                }
                //012
                $last_two_qm012_res       = self::qm_info($last_two_zuxuan_res[1]);
                $last_one_qm012_res       = self::qm_info($last_one_zuxuan_res[1]);
                $last_qm012_res           = self::qm_info($last_zero_zuxuan_res[1]);
                $qm012_res                = self::qm_info($zuxuan_res[1]);
                $qm012_arr[]              = $qm012_res;
                for($a=0;$a<3;$a++){
                    if(empty($qm012yl[$a+1])){
                        $qm012yl[$a+1]=0;
                    }
                    if($a == $qm012_res){
                        $qm012yl[$a+1] = 0;
                    }else{
                        $qm012yl[$a+1] += 1;
                    }
                }
                foreach ($qm012yl as $key => $value) {
                    ${'qm012tj'.$key}[] = $value;
                }
                //012升降屏
                $qm012_sjp_res            = self::sjp_info($qm012_res,$last_qm012_res);
                $qm012_sjp_arr[]          = $qm012_sjp_res;
                for($a=1;$a<4;$a++){
                    if(empty($qm012sjpyl[$a])){
                        $qm012sjpyl[$a]=0;
                    }
                    if($a == $qm012_sjp_res){
                        $qm012sjpyl[$a] = 0;
                    }else{
                        $qm012sjpyl[$a] += 1;
                    }
                }
                foreach ($qm012sjpyl as $key => $value) {
                    ${'qm012sjptj'.$key}[] = $value;
                }
                //012升降屏的升降屏
                $last_qm012_sjp_res       = self::sjp_info($last_qm012_res,$last_one_qm012_res);
                $qm012_sjp2_res           = self::sjp_info($qm012_sjp_res,$last_qm012_sjp_res);
                $qm012_sjp2_arr[]         = $qm012_sjp2_res;
                for($a=1;$a<4;$a++){
                    if(empty($qm012sjp2yl[$a])){
                        $qm012sjp2yl[$a]=0;
                    }
                    if($a == $qm012_sjp2_res){
                        $qm012sjp2yl[$a] = 0;
                    }else{
                        $qm012sjp2yl[$a] += 1;
                    }
                }
                foreach ($qm012sjp2yl as $key => $value) {
                    ${'qm012sjp2tj'.$key}[] = $value;
                }
                //012距离
                $last_qm012_jl2_res       = self::jl_info($last_one_qm012_res,$last_two_qm012_res);
                $last_qm012_jl_res        = self::jl_info($last_qm012_res,$last_one_qm012_res);
                $qm012_jl_res             = self::jl_info($qm012_res,$last_qm012_res);
                $qm012_jl_arr[]           = $qm012_jl_res;
                for($a=0;$a<3;$a++){
                    if(empty($qm012jlyl[$a+1])){
                        $qm012jlyl[$a+1]=0;
                    }
                    if($a == $qm012_jl_res){
                        $qm012jlyl[$a+1] = 0;
                    }else{
                        $qm012jlyl[$a+1] += 1;
                    }
                }
                foreach ($qm012jlyl as $key => $value) {
                    ${'qm012jltj'.$key}[] = $value;
                }
                //012距离升降屏
                $qm012_jl_sjp_res         = self::sjp_info($qm012_jl_res,$last_qm012_jl_res);
                $qm012_jl_sjp_arr[]       = $qm012_jl_sjp_res;
                for($a=1;$a<4;$a++){
                    if(empty($qm012jlsjpyl[$a])){
                        $qm012jlsjpyl[$a]=0;
                    }
                    if($a == $qm012_jl_sjp_res){
                        $qm012jlsjpyl[$a] = 0;
                    }else{
                        $qm012jlsjpyl[$a] += 1;
                    }
                }
                foreach ($qm012jlsjpyl as $key => $value) {
                    ${'qm012jlsjptj'.$key}[] = $value;
                }
                //012距离升降屏的升降屏
                $last_qm012_jl_sjp2        = self::sjp_info($last_qm012_jl_res,$last_qm012_jl2_res);
                $qm012_jl_sjp2_res         = self::sjp_info($qm012_jl_sjp_res,$last_qm012_jl_sjp2);
                $qm012_jl_sjp2_arr[]       = $qm012_jl_sjp2_res;
                for($a=1;$a<4;$a++){
                    if(empty($qm012jlsjp2yl[$a])){
                        $qm012jlsjp2yl[$a]=0;
                    }
                    if($a == $qm012_jl_sjp2_res){
                        $qm012jlsjp2yl[$a] = 0;
                    }else{
                        $qm012jlsjp2yl[$a] += 1;
                    }
                }
                foreach ($qm012jlsjp2yl as $key => $value) {
                    ${'qm012jlsjp2tj'.$key}[] = $value;
                }
                //大中小
                $last_two_bigorsmall_res   = self::bigorsmall($last_two_zuxuan_res[1]);
                $last_one_bigorsmall_res   = self::bigorsmall($last_one_zuxuan_res[1]);
                $last_bigorsmall_res       = self::bigorsmall($last_zero_zuxuan_res[1]);
                
                $bigorsmall_res            = self::bigorsmall($zuxuan_res[1]);
                $bigorsmall_arr[]          = $bigorsmall_res;
                for($a=0;$a<3;$a++){
                    if(empty($dxyl[$a+1])){
                        $dxyl[$a+1]=0;
                    }
                    if($a == $bigorsmall_res){
                        $dxyl[$a+1] = 0;
                    }else{
                        $dxyl[$a+1] += 1;
                    }
                }
                foreach ($dxyl as $key => $value) {
                    ${'$dxtj'.$key}[] = $value;
                }
                //大中小升降屏
                $bigorsmall_sjp_res            = self::sjp_info($bigorsmall_res,$last_bigorsmall_res);
                $bigorsmall_sjp_arr[]          = $bigorsmall_sjp_res;
                for($a=1;$a<4;$a++){
                    if(empty($dxsjpyl[$a])){
                        $dxsjpyl[$a]=0;
                    }
                    if($a == $bigorsmall_sjp_res){
                        $dxsjpyl[$a] = 0;
                    }else{
                        $dxsjpyl[$a] += 1;
                    }
                }
                foreach ($dxsjpyl as $key => $value) {
                    ${'$dxsjptj'.$key}[] = $value;
                }
                //大中小升降屏的升降屏
                $last_bigorsmall_sjp_res       = self::sjp_info($last_bigorsmall_res,$last_one_bigorsmall_res);
                $bigorsmall_sjp2_res           = self::sjp_info($bigorsmall_sjp_res,$last_bigorsmall_sjp_res);
                $bigorsmall_sjp2_arr[]         = $bigorsmall_sjp2_res;
                for($a=1;$a<4;$a++){
                    if(empty($dxsjp2yl[$a])){
                        $dxsjp2yl[$a]=0;
                    }
                    if($a == $bigorsmall_sjp2_res){
                        $dxsjp2yl[$a] = 0;
                    }else{
                        $dxsjp2yl[$a] += 1;
                    }
                }
                foreach ($dxsjp2yl as $key => $value) {
                    ${'$dxsjp2tj'.$key}[] = $value;
                }
                //大中小距离
                $last_bigorsmall_jl2_res       = self::jl_info($last_one_bigorsmall_res,$last_two_bigorsmall_res);
                $last_bigorsmall_jl_res        = self::jl_info($last_bigorsmall_res,$last_one_bigorsmall_res);
                $bigorsmall_jl_res             = self::jl_info($bigorsmall_res,$last_bigorsmall_res);
                $bigorsmall_jl_arr[]           = $bigorsmall_jl_res;
                for($a=0;$a<3;$a++){
                    if(empty($dxjlyl[$a+1])){
                        $dxjlyl[$a+1]=0;
                    }
                    if($a == $bigorsmall_jl_res){
                        $dxjlyl[$a+1] = 0;
                    }else{
                        $dxjlyl[$a+1] += 1;
                    }
                }
                foreach ($dxjlyl as $key => $value) {
                    ${'$dxjltj'.$key}[] = $value;
                }
                //大中小距离升降屏
                $bigorsmall_jl_sjp_res         = self::sjp_info($bigorsmall_jl_res,$last_bigorsmall_jl_res);
                $bigorsmall_jl_sjp_arr[]       = $bigorsmall_jl_sjp_res;
                for($a=1;$a<4;$a++){
                    if(empty($dxjlsjpyl[$a])){
                        $dxjlsjpyl[$a]=0;
                    }
                    if($a == $bigorsmall_jl_sjp_res){
                        $dxjlsjpyl[$a] = 0;
                    }else{
                        $dxjlsjpyl[$a] += 1;
                    }
                }
                foreach ($dxjlsjpyl as $key => $value) {
                    ${'$dxjlsjptj'.$key}[] = $value;
                }
                //大中小距离升降屏的升降屏
                $last_bigorsmall_jl_sjp2        = self::sjp_info($last_bigorsmall_jl_res,$last_bigorsmall_jl2_res);
                $bigorsmall_jl_sjp2_res         = self::sjp_info($bigorsmall_jl_sjp_res,$last_bigorsmall_jl_sjp2);
                $bigorsmall_jl_sjp2_arr[]       = $bigorsmall_jl_sjp2_res;
                for($a=1;$a<4;$a++){
                    if(empty($dxjlsjp2yl[$a])){
                        $dxjlsjp2yl[$a]=0;
                    }
                    if($a == $bigorsmall_jl_sjp2_res){
                        $dxjlsjp2yl[$a] = 0;
                    }else{
                        $dxjlsjp2yl[$a] += 1;
                    }
                }
                foreach ($dxjlsjp2yl as $key => $value) {
                    ${'$dxjlsjp2tj'.$key}[] = $value;
                }
                $expand_arr = array('zuxuan_val'=>$zuxuanval,'sjp'=>$sjp_res,'sjpjl'=>$sjp_jl_res,'sjpjlsjp'=>$sjp_jl_sjp_res,'sjpjlsjp2'=>$sjp_jl_sjp2_res,'sjp2'=>$sjpdesjp_res,'jl'=>$jlinfo_res,'jlsjp'=>$jl_sjp_res,'jlsjpjl'=>$jl_sjp_jl_res,'jlsjpjlsjp'=>$jl_sjp_jl_sjp_res,'jlsjpjlsjp2'=>$jl_sjp_jl_sjp2_res,'jlsjp2'=>$jl_sjp2_res,'jl2'=>$jl2info_res,'jl2sjp'=>$jl2_sjp_res,'jl2sjp2'=>$jl2_sjp2_res,'jl3'=>$jl3info_res,'jl3sjp'=>$jl3_sjp_res,'jl3sjp2'=>$jl3_sjp2_res,'jl4'=>$jl4info_res,'jl4sjp'=>$jl4_sjp_res,'jl4sjp2'=>$jl4_sjp2_res,'qm012'=>$qm012_res,'qm012sjp'=>$qm012_sjp_res,'qm012sjp2'=>$qm012_sjp2_res,'qm012jl'=>$qm012_jl_res,'qm012jlsjp'=>$qm012_jl_sjp_res,'qm012jlsjp2'=>$qm012_jl_sjp2_res,'dx'=>$bigorsmall_res,'dxsjp'=>$bigorsmall_sjp_res,'dxsjp2'=>$bigorsmall_sjp2_res,'dxjl'=>$bigorsmall_jl_res,'dxjlsjp'=>$bigorsmall_jl_sjp_res,'dxjlsjp2'=>$bigorsmall_jl_sjp2_res,'one'=>$one,'sjpyl'=>$sjpyl,'sjpjlyl'=>$sjpjlyl,'sjpjlsjpyl'=>$sjpjlsjpyl,'sjpjlsjp2yl'=>$sjpjlsjp2yl,'sjpyl2'=>$sjpyl2,'jlyl'=>$jlyl,'jlsjpyl'=>$jlsjpyl,'jlsjpjlyl'=>$jlsjpjlyl,'jlsjpjlsjpyl'=>$jlsjpjlsjpyl,'jlsjpjlsjp2yl'=>$jlsjpjlsjp2yl,'jlsjp2yl'=>$jlsjp2yl,'jl2yl'=>$jl2yl,'jl2sjpyl'=>$jl2sjpyl,'jl2sjp2yl'=>$jl2sjp2yl,'jl3yl'=>$jl3yl,'jl3sjpyl'=>$jl3sjpyl,'jl3sjp2yl'=>$jl3sjp2yl,'jl4yl'=>$jl4yl,'jl4sjpyl'=>$jl4sjpyl,'jl4sjp2yl'=>$jl4sjp2yl,'qm012yl'=>$qm012yl,'qm012sjpyl'=>$qm012sjpyl,'qm012sjp2yl'=>$qm012sjp2yl,'qm012jlyl'=>$qm012jlyl,'qm012jlsjpyl'=>$qm012jlsjpyl,'qm012jlsjp2yl'=>$qm012jlsjp2yl,'dxyl'=>$dxyl,'dxsjpyl'=>$dxsjpyl,'dxsjp2yl'=>$dxsjp2yl,'dxjlyl'=>$dxjlyl,'dxjlsjpyl'=>$dxjlsjpyl,'dxjlsjp2yl'=>$dxjlsjp2yl);
                $expand = json_encode($expand_arr);
               //Redis::command('HSET', ['yilou', $eid, $expand]);
                //Redis::command('HSET', ['yilouwan', $eid, $expand]);
                Redis::command('HSET', ['yilouqian', $eid, $expand]);
                
            }else{
                
                $last_number_arr = array($data[$key-1]->WAN,$data[$key-1]->BAI,$data[$key-1]->SHI,$data[$key-1]->GE);
    
                //组选120的值
                $zuxuan_res           = self::zuxuan120($number_arr);
                $last_zuxuan_res      = self::zuxuan120($last_number_arr);
                /*for($a=1;$a<7;$a++){
                    if($a == $zuxuan_res[1]){
                        $one[$a] = 0;
                    }else{
                        $one[$a] += 1;
                    }
                }*/
                for($a=1;$a<6;$a++){
                    if($a == $zuxuan_res[1]){
                        $one[$a] = 0;
                    }else{
                        $one[$a] += 1;
                    }
                }

                foreach ($one as $k => $value) {
                  ${$zxtj.$k}[]  = $value;
                }
                $zuxuanval = $zuxuan_res[1];  //组选120值
                //升降屏
                $sjp_res               = self::sjp_info($zuxuan_res[1],$last_zuxuan_res[1]);
                $sjp_arr[] = $sjp_res;
                for($a=1;$a<4;$a++){
                    if($a == $sjp_res){
                        $sjpyl[$a] = 0;
                    }else{
                        $sjpyl[$a] += 1;
                    }
                }
                foreach ($sjpyl as $k => $value) {
                    ${'sjptj'.$k}[] = $value;
                }
                //升降屏的距离
                $sjp_jl_res            = self::jl_info($sjp_res,$sjp_arr[$key-1]);
                for($a=0; $a<3; $a++){
                    if($a == $sjp_jl_res){
                        $sjpjlyl[$a+1] = 0;
                    }else{
                        $sjpjlyl[$a+1] += 1;
                    }
                }
                $sjp_jl_arr[]          = $sjp_jl_res;
                foreach ($sjpjlyl as $k => $value) {
                   ${'sjpjltj'.$k}[] = $value;
                }
                // 升降屏的距离的升降屏
                $sjp_jl_sjp_res       = self::sjp_info($sjp_jl_res,$sjp_jl_arr[$key-1]);
                for($a=1; $a<4; $a++){
                    if($a == $sjp_jl_sjp_res){
                        $sjpjlsjpyl[$a] = 0;
                    }else{
                        $sjpjlsjpyl[$a] += 1;
                    }
                }
                $sjp_jl_sjp_arr[]         = $sjp_jl_res;
                foreach ($sjpjlsjpyl as $k => $value) {
                    ${'sjpjlsjptj'.$k}[] = $value;
                }
                // 升降屏的距离的升降屏的升降屏
                $sjp_jl_sjp2_res      = self::sjp_info($sjp_jl_sjp_res,$sjp_jl_sjp_arr[$key-1]);
                for($a=1; $a<4; $a++){
                    if($a == $sjp_jl_sjp2_res){
                        $sjpjlsjp2yl[$a] = 0;
                    }else{
                        $sjpjlsjp2yl[$a] += 1;
                    }
                }
                foreach ($sjpjlsjp2yl as $k => $value) {
                    ${'sjpjlsjp2tj'.$k}[] = $value;
                }

                //升降屏的升降屏
                $sjpdesjp_res          = self::sjp_info($sjp_res,$sjp_arr[$key-1]);
                for($a=1;$a<4;$a++){
                    if($a == $sjpdesjp_res){
                        $sjpyl2[$a] = 0;
                    }else{
                        $sjpyl2[$a] += 1;
                    }
                }
                foreach ($sjpyl2 as $k => $value) {
                    ${'sjp2tj'.$k}[] = $value;
                }
                //距离
                $jlinfo_res           = self::jl_info($zuxuan_res[1],$last_zuxuan_res[1]);
                $jlinfo_arr[]         = $jlinfo_res; 
                /*for($a=0;$a<6;$a++){
                    if($a == $jlinfo_res){
                        $jlyl[$a+1] = 0;
                    }else{
                        $jlyl[$a+1] += 1;
                    }
                }*/
                for($a=0;$a<5;$a++){
                    if($a == $jlinfo_res){
                        $jlyl[$a+1] = 0;
                    }else{
                        $jlyl[$a+1] += 1;
                    }
                }
                foreach ($jlyl as $k => $value) {
                    ${'jltj'.$k}[] = $value;
                }
                //距离的升降屏
                $jl_sjp_res              = self::sjp_info($jlinfo_res,$jlinfo_arr[$key-1]);
                $jl_sjp_arr[]            = $jl_sjp_res;
                for($a=1;$a<4;$a++){
                    if($a == $jl_sjp_res){
                        $jlsjpyl[$a] = 0;
                    }else{
                        $jlsjpyl[$a] += 1;
                    }
                }
                foreach ($jlsjpyl as $k => $value) {
                    ${'jlsjptj'.$k}[] = $value;
                }
                //距离的升降屏的距离
                $jl_sjp_jl_res           = self::jl_info($jl_sjp_res,$jl_sjp_arr[$key-1]);
                $jl_sjp_jl_arr[]         = $jl_sjp_jl_res;
                for($a=0;$a<3;$a++){
                    if($a == $jl_sjp_jl_res){
                        $jlsjpjlyl[$a+1] = 0;
                    }else{
                        $jlsjpjlyl[$a+1] += 1;
                    }
                }
                foreach ($jlsjpjlyl as $k => $value) {
                     ${'jlsjpjltj'.$k}[] = $value;
                }
                //距离升降屏的距离的升降屏
                $jl_sjp_jl_sjp_res        = self::sjp_info($jl_sjp_jl_res,$jl_sjp_jl_arr[$key-1]);
                $jl_sjp_jl_sjp_arr[]      = $jl_sjp_jl_sjp_res;
                for($a=1; $a<4; $a++){
                    if($a == $jl_sjp_jl_sjp_res){
                        $jlsjpjlsjpyl[$a] = 0;
                    }else{
                        $jlsjpjlsjpyl[$a] += 1;
                    }
                }
                foreach ($jlsjpjlsjpyl as $k => $value) {
                    ${'jlsjpjlsjptj'.$k}[] = $value;
                }
                //距离升降屏的距离的升降屏的升降屏
                $jl_sjp_jl_sjp2_res        = self::sjp_info($jl_sjp_jl_sjp_res,$jl_sjp_jl_sjp_arr[$key-1]);
                for($a=1; $a<4; $a++){
                    if($a == $jl_sjp_jl_sjp2_res){
                        $jlsjpjlsjp2yl[$a] = 0;
                    }else{
                        $jlsjpjlsjp2yl[$a] += 1;
                    }
                }
                foreach ($jlsjpjlsjp2yl as $k => $value) {
                    ${'jlsjpjlsjp2tj'.$k}[] = $value;
                }
                //距离的升降屏的升降屏
                $jl_sjp2_res             = self::sjp_info($jl_sjp_res,$jl_sjp_arr[$key-1]);
                $jl_sjp2_arr[]           = $jl_sjp2_res;
                for($a=1;$a<4;$a++){
                    if($a == $jl_sjp2_res){
                        $jlsjp2yl[$a] = 0;
                    }else{
                        $jlsjp2yl[$a] += 1;
                    }
                }
                foreach ($jlsjp2yl as $k => $value) {
                    ${'jlsjp2tj'.$k}[] = $value;
                }
                //距离2
                $jl2info_res          = self::jl_info($jlinfo_res ,$jlinfo_arr[$key-1]);
                $jl2info_arr[]        = $jl2info_res; 
                /*for($a=0;$a<5;$a++){
                    if($a == $jl2info_res){
                        $jl2yl[$a+1] = 0;
                    }else{
                        $jl2yl[$a+1] += 1;
                    }
                }*/
                for($a=0;$a<4;$a++){
                    if($a == $jl2info_res){
                        $jl2yl[$a+1] = 0;
                    }else{
                        $jl2yl[$a+1] += 1;
                    }
                }
                foreach ($jl2yl as $k => $value) {
                    ${'jl2tj'.$k}[] = $value;
                }
                //距离的升降屏
                $jl2_sjp_res              = self::sjp_info($jl2info_res,$jl2info_arr[$key-1]);
                $jl2_sjp_arr[]            = $jl2_sjp_res;
                for($a=1;$a<4;$a++){
                    if($a == $jl2_sjp_res){
                        $jl2sjpyl[$a] = 0;
                    }else{
                        $jl2sjpyl[$a] += 1;
                    }
                }
                foreach ($jl2sjpyl as $k => $value) {
                    ${'jl2sjptj'.$k}[] = $value;
                }
                //距离的升降屏的升降屏
                $jl2_sjp2_res             = self::sjp_info($jl2_sjp_res,$jl2_sjp_arr[$key-1]);
                $jl2_sjp2_arr[]           = $jl2_sjp2_res;
                for($a=1;$a<4;$a++){
                    if($a == $jl2_sjp2_res){
                        $jl2sjp2yl[$a] = 0;
                    }else{
                        $jl2sjp2yl[$a] += 1;
                    }
                }
                foreach ($jl2sjp2yl as $k => $value) {
                    ${'jl2sjp2tj'.$k}[] = $value;
                }
                //距离3
                $jl3info_res          = self::jl_info($jl2info_res ,$jl2info_arr[$key-1]);
                $jl3info_arr[]        = $jl3info_res; 
                /*for($a=0;$a<4;$a++){
                    if($a == $jl3info_res){
                        $jl3yl[$a+1] = 0;
                    }else{
                        $jl3yl[$a+1] += 1;
                    }
                }*/
                for($a=0;$a<3;$a++){
                    if($a == $jl3info_res){
                        $jl3yl[$a+1] = 0;
                    }else{
                        $jl3yl[$a+1] += 1;
                    }
                }
                foreach ($jl3yl as $k => $value) {
                    ${'jl3tj'.$k}[] = $value;
                }
                //距离的升降屏
                $jl3_sjp_res              = self::sjp_info($jl3info_res,$jl3info_arr[$key-1]);
                $jl3_sjp_arr[]            = $jl3_sjp_res;
                for($a=1;$a<4;$a++){
                    if($a == $jl3_sjp_res){
                        $jl3sjpyl[$a] = 0;
                    }else{
                        $jl3sjpyl[$a] += 1;
                    }
                }
                foreach ($jl3sjpyl as $k => $value) {
                    ${'jl3sjptj'.$k}[] = $value;
                }
                //距离的升降屏的升降屏
                $jl3_sjp2_res             = self::sjp_info($jl3_sjp_res,$jl3_sjp_arr[$key-1]);
                $jl3_sjp2_arr[]           = $jl3_sjp2_res;
                for($a=1;$a<4;$a++){
                    if($a == $jl3_sjp2_res){
                        $jl3sjp2yl[$a] = 0;
                    }else{
                        $jl3sjp2yl[$a] += 1;
                    }
                }
                foreach ($jl3sjp2yl as $k => $value) {
                    ${'jl3sjp2tj'.$k}[] = $value;
                }
                //距离4
                $jl4info_res          = self::jl_info($jl3info_res ,$jl3info_arr[$key-1]);
                $jl4info_arr[]        = $jl4info_res; 
                /*for($a=0;$a<3;$a++){
                    if($a == $jl4info_res){
                        $jl4yl[$a+1] = 0;
                    }else{
                        $jl4yl[$a+1] += 1;
                    }
                }*/
                for($a=0;$a<2;$a++){
                    if($a == $jl4info_res){
                        $jl4yl[$a+1] = 0;
                    }else{
                        $jl4yl[$a+1] += 1;
                    }
                }
                foreach ($jl4yl as $k => $value) {
                    ${'jl4tj'.$k}[] = $value;
                }
                //距离的升降屏
                $jl4_sjp_res              = self::sjp_info($jl4info_res,$jl4info_arr[$key-1]);
                $jl4_sjp_arr[]            = $jl4_sjp_res;
                for($a=1;$a<4;$a++){
                    if($a == $jl4_sjp_res){
                        $jl4sjpyl[$a] = 0;
                    }else{
                        $jl4sjpyl[$a] += 1;
                    }
                }
                foreach ($jl4sjpyl as $k => $value) {
                    ${'jl4sjptj'.$k}[] = $value;
                }
                //距离的升降屏的升降屏
                $jl4_sjp2_res             = self::sjp_info($jl4_sjp_res,$jl4_sjp_arr[$key-1]);
                $jl4_sjp2_arr[]           = $jl4_sjp2_res;
                for($a=1;$a<4;$a++){
                    if($a == $jl4_sjp2_res){
                        $jl4sjp2yl[$a] = 0;
                    }else{
                        $jl4sjp2yl[$a] += 1;
                    }
                }
                foreach ($jl4sjp2yl as $k => $value) {
                    ${'jl4sjp2tj'.$k}[] = $value;
                }
                //012
                $qm012_res                = self::qm_info($zuxuan_res[1]);
                $qm012_arr[]              = $qm012_res;
                for($a=0;$a<3;$a++){
                    if($a == $qm012_res){
                        $qm012yl[$a+1] = 0;
                    }else{
                        $qm012yl[$a+1] += 1;
                    }
                }
                foreach ($qm012yl as $k => $value) {
                    ${'qm012tj'.$k}[] = $value;
                }
                //012升降屏
                $qm012_sjp_res            = self::sjp_info($qm012_res,$qm012_arr[$key-1]);
                $qm012_sjp_arr[]          = $qm012_sjp_res;
                for($a=1;$a<4;$a++){
                    if($a == $qm012_sjp_res){
                        $qm012sjpyl[$a] = 0;
                    }else{
                        $qm012sjpyl[$a] += 1;
                    }
                }
                foreach ($qm012sjpyl as $k => $value) {
                    ${'qm012sjptj'.$k}[] = $value;
                }
                //012升降屏的升降屏
                $qm012_sjp2_res           = self::sjp_info($qm012_sjp_res,$qm012_sjp_arr[$key-1]);
                $qm012_sjp2_arr[]         = $qm012_sjp2_res;
                for($a=1;$a<4;$a++){
                    if($a == $qm012_sjp2_res){
                        $qm012sjp2yl[$a] = 0;
                    }else{
                        $qm012sjp2yl[$a] += 1;
                    }
                }
                foreach ($qm012sjp2yl as $k => $value) {
                    ${'qm012sjp2tj'.$k}[] = $value;
                }
                //012距离
                $qm012_jl_res             = self::jl_info($qm012_res,$qm012_arr[$key-1]);
                $qm012_jl_arr[]           = $qm012_jl_res;
                for($a=0;$a<3;$a++){
                    if($a == $qm012_jl_res){
                        $qm012jlyl[$a+1] = 0;
                    }else{
                        $qm012jlyl[$a+1] += 1;
                    }
                }
                foreach ($qm012jlyl as $k => $value) {
                    ${'qm012jltj'.$k}[] = $value;
                }
                //012距离升降屏
                $qm012_jl_sjp_res         = self::sjp_info($qm012_jl_res,$qm012_jl_arr[$key-1]);
                $qm012_jl_sjp_arr[]       = $qm012_jl_sjp_res;
                for($a=1;$a<4;$a++){
                    if($a == $qm012_jl_sjp_res){
                        $qm012jlsjpyl[$a] = 0;
                    }else{
                        $qm012jlsjpyl[$a] += 1;
                    }
                }
                foreach ($qm012jlsjpyl as $k => $value) {
                    ${'qm012jlsjptj'.$k}[] = $value;
                }
                //012距离升降屏的升降屏
                $qm012_jl_sjp2_res         = self::sjp_info($qm012_jl_sjp_res,$qm012_jl_sjp_arr[$key-1]);
                $qm012_jl_sjp2_arr[]       = $qm012_jl_sjp2_res;
                for($a=1;$a<4;$a++){
                    if($a == $qm012_jl_sjp2_res){
                        $qm012jlsjp2yl[$a] = 0;
                    }else{
                        $qm012jlsjp2yl[$a] += 1;
                    }
                }
                foreach ($qm012jlsjp2yl as $k => $value) {
                    ${'qm012jlsjp2tj'.$k}[] = $value;
                }
                //大中小
                $bigorsmall_res                = self::bigorsmall($zuxuan_res[1]);
                $bigorsmall_arr[]              = $bigorsmall_res;
                for($a=0;$a<3;$a++){
                    if($a == $bigorsmall_res){
                        $dxyl[$a+1] = 0;
                    }else{
                        $dxyl[$a+1] += 1;
                    }
                }
                foreach ($dxyl as $k => $value) {
                    ${'dxtj'.$k}[] = $value;
                }
                //大中小升降屏
                $bigorsmall_sjp_res            = self::sjp_info($bigorsmall_res,$bigorsmall_arr[$key-1]);
                $bigorsmall_sjp_arr[]          = $bigorsmall_sjp_res;
                for($a=1;$a<4;$a++){
                    if($a == $bigorsmall_sjp_res){
                        $dxsjpyl[$a] = 0;
                    }else{
                        $dxsjpyl[$a] += 1;
                    }
                }
                foreach ($dxsjpyl as $k => $value) {
                    ${'dxsjptj'.$k}[] = $value;
                }
                //大中小升降屏的升降屏
                $bigorsmall_sjp2_res           = self::sjp_info($bigorsmall_sjp_res,$bigorsmall_sjp_arr[$key-1]);
                $bigorsmall_sjp2_arr[]         = $bigorsmall_sjp2_res;
                for($a=1;$a<4;$a++){
                    if($a == $bigorsmall_sjp2_res){
                        $dxsjp2yl[$a] = 0;
                    }else{
                        $dxsjp2yl[$a] += 1;
                    }
                }
                foreach ($dxsjp2yl as $k => $value) {
                    ${'dxsjp2tj'.$k}[] = $value;
                }
                //大中小距离
                $bigorsmall_jl_res             = self::jl_info($bigorsmall_res,$bigorsmall_arr[$key-1]);
                $bigorsmall_jl_arr[]           = $bigorsmall_jl_res;
                for($a=0;$a<3;$a++){
                    if($a == $bigorsmall_jl_res){
                        $dxjlyl[$a+1] = 0;
                    }else{
                        $dxjlyl[$a+1] += 1;
                    }
                }
                foreach ($dxjlyl as $k => $value) {
                    ${'dxjltj'.$k}[] = $value;
                }
                //大中小距离升降屏
                $bigorsmall_jl_sjp_res         = self::sjp_info($bigorsmall_jl_res,$bigorsmall_jl_arr[$key-1]);
                $bigorsmall_jl_sjp_arr[]       = $bigorsmall_jl_sjp_res;
                for($a=1;$a<4;$a++){
                    if($a == $bigorsmall_jl_sjp_res){
                        $dxjlsjpyl[$a] = 0;
                    }else{
                        $dxjlsjpyl[$a] += 1;
                    }
                }
                foreach ($dxjlsjpyl as $k => $value) {
                    ${'dxjlsjptj'.$k}[] = $value;
                }
                //大中小距离升降屏的升降屏
                $bigorsmall_jl_sjp2_res         = self::sjp_info($bigorsmall_jl_sjp_res,$bigorsmall_jl_sjp_arr[$key-1]);
                $bigorsmall_jl_sjp2_arr[]       = $bigorsmall_jl_sjp2_res;
                for($a=1;$a<4;$a++){
                    if($a == $bigorsmall_jl_sjp2_res){
                        $dxjlsjp2yl[$a] = 0;
                    }else{
                        $dxjlsjp2yl[$a] += 1;
                    }
                }
                foreach ($dxjlsjp2yl as $k => $value) {
                    ${'dxjlsjp2tj'.$k}[] = $value;
                }
                $expand_arr = array('zuxuan_val'=>$zuxuanval,'sjp'=>$sjp_res,'sjpjl'=>$sjp_jl_res,'sjpjlsjp'=>$sjp_jl_sjp_res,'sjpjlsjp2'=>$sjp_jl_sjp2_res,'sjp2'=>$sjpdesjp_res,'jl'=>$jlinfo_res,'jlsjp'=>$jl_sjp_res,'jlsjpjl'=>$jl_sjp_jl_res,'jlsjpjlsjp'=>$jl_sjp_jl_sjp_res,'jlsjpjlsjp2'=>$jl_sjp_jl_sjp2_res,'jlsjp2'=>$jl_sjp2_res,'jl2'=>$jl2info_res,'jl2sjp'=>$jl2_sjp_res,'jl2sjp2'=>$jl2_sjp2_res,'jl3'=>$jl3info_res,'jl3sjp'=>$jl3_sjp_res,'jl3sjp2'=>$jl3_sjp2_res,'jl4'=>$jl4info_res,'jl4sjp'=>$jl4_sjp_res,'jl4sjp2'=>$jl4_sjp2_res,'qm012'=>$qm012_res,'qm012sjp'=>$qm012_sjp_res,'qm012sjp2'=>$qm012_sjp2_res,'qm012jl'=>$qm012_jl_res,'qm012jlsjp'=>$qm012_jl_sjp_res,'qm012jlsjp2'=>$qm012_jl_sjp2_res,'dx'=>$bigorsmall_res,'dxsjp'=>$bigorsmall_sjp_res,'dxsjp2'=>$bigorsmall_sjp2_res,'dxjl'=>$bigorsmall_jl_res,'dxjlsjp'=>$bigorsmall_jl_sjp_res,'dxjlsjp2'=>$bigorsmall_jl_sjp2_res,'one'=>$one,'sjpyl'=>$sjpyl,'sjpjlyl'=>$sjpjlyl,'sjpjlsjpyl'=>$sjpjlsjpyl,'sjpjlsjp2yl'=>$sjpjlsjp2yl,'sjpyl2'=>$sjpyl2,'jlyl'=>$jlyl,'jlsjpyl'=>$jlsjpyl,'jlsjpjlyl'=>$jlsjpjlyl,'jlsjpjlsjpyl'=>$jlsjpjlsjpyl,'jlsjpjlsjp2yl'=>$jlsjpjlsjp2yl,'jlsjp2yl'=>$jlsjp2yl,'jl2yl'=>$jl2yl,'jl2sjpyl'=>$jl2sjpyl,'jl2sjp2yl'=>$jl2sjp2yl,'jl3yl'=>$jl3yl,'jl3sjpyl'=>$jl3sjpyl,'jl3sjp2yl'=>$jl3sjp2yl,'jl4yl'=>$jl4yl,'jl4sjpyl'=>$jl4sjpyl,'jl4sjp2yl'=>$jl4sjp2yl,'qm012yl'=>$qm012yl,'qm012sjpyl'=>$qm012sjpyl,'qm012sjp2yl'=>$qm012sjp2yl,'qm012jlyl'=>$qm012jlyl,'qm012jlsjpyl'=>$qm012jlsjpyl,'qm012jlsjp2yl'=>$qm012jlsjp2yl,'dxyl'=>$dxyl,'dxsjpyl'=>$dxsjpyl,'dxsjp2yl'=>$dxsjp2yl,'dxjlyl'=>$dxjlyl,'dxjlsjpyl'=>$dxjlsjpyl,'dxjlsjp2yl'=>$dxjlsjp2yl);
                $expand = json_encode($expand_arr);
                //Redis::command('HSET', ['yilou', $eid, $expand]);
                //Redis::command('HSET', ['yilouwan', $eid, $expand]);
                Redis::command('HSET', ['yilouqian', $eid, $expand]);

                Redis::command('HSET', ['nowindex', 'big', $eid]);
            }
        }
        //统计
        //出现次数 //组选
        for($na=1;$na<6;$na++){
            //................................................................0
           $zxtj_count[$na] = array_count_values(${'zxtj'.$na})[0];
           $zxtj_zdyl[$na]     = max(${'zxtj'.$na});
           
           ${'zxtj1'.$na}   = array_merge(array_diff(${'zxtj'.$na}, array('0'))); //去除0
           ${'zxtj1'.$na.'sum'}        = array_sum(${'zxtj1'.$na});
           $zxtj_pjyl[$na]     = round(${'zxtj1'.$na.'sum'}/count(${'zxtj1'.$na}));

           ${'zxtj2'.$na} = array_keys(preg_grep("/^0/", ${'zxtj'.$na})); //键的数组
           $zxtj_zdlc[$na] = self::zdlc(${'zxtj2'.$na});

           foreach (${'zxtj'.$na} as $key => $value) {
               ${'zxtjn'.$na}[$key+1] = $value;
           }
           //Redis::command('HSET', ['zxtj', 'zxtj'.$na, json_encode(${'zxtjn'.$na})]);

            //Redis::command('HSET', ['zxtjwan', 'zxtj'.$na, json_encode(${'zxtjn'.$na})]);
            Redis::command('HSET', ['zxtjqian', 'zxtj'.$na, json_encode(${'zxtjn'.$na})]);
        
        }
        //升降屏
        for($nb=1;$nb<4;$nb++){
            //...............................................................1
           $sjptj_count[$nb]= array_count_values(${'sjptj'.$nb})[0];
           $sjptj_zdyl[$nb]    = max(${'sjptj'.$nb});

           ${'sjptj1'.$nb}          = array_merge(array_diff(${'sjptj'.$nb}, array('0'))); //去除0
           ${'sjptj1'.$nb.'sum'}    = array_sum(${'sjptj1'.$nb});
           $sjptj_pjyl[$nb]    = round(${'sjptj1'.$nb.'sum'}/count(${'sjptj1'.$nb}));

           ${'sjptj2'.$nb} = array_keys(preg_grep("/^0/", ${'sjptj'.$nb})); //键的数组
           $sjptj_zdlc[$nb] = self::zdlc(${'sjptj2'.$nb});

           foreach (${'sjptj'.$nb} as $key => $value) {
               ${'sjptjn'.$nb}[$key+1] = $value;
           }

           //Redis::command('HSET', ['sjptj', 'sjptj'.$nb, json_encode(${'sjptjn'.$nb})]);

            //Redis::command('HSET', ['sjptjwan', 'sjptj'.$nb, json_encode(${'sjptjn'.$nb})]);
         Redis::command('HSET', ['sjptjqian', 'sjptj'.$nb, json_encode(${'sjptjn'.$nb})]);
        
           
            //.................................................................2
           $sjpjltj_count[$nb]  = array_count_values(${'sjpjltj'.$nb})[0];
           $sjpjltj_zdyl[$nb]      = max(${'sjpjltj'.$nb});

           ${'sjpjltj1'.$nb}    = array_merge(array_diff(${'sjpjltj'.$nb}, array('0'))); //去除0
           ${'sjpjltj1'.$nb.'sum'}         = array_sum(${'sjpjltj1'.$nb});
           $sjpjltj_pjyl[$nb]      = round(${'sjpjltj1'.$nb.'sum'}/count(${'sjpjltj1'.$nb}));

           ${'sjpjltj2'.$nb} = array_keys(preg_grep("/^0/", ${'sjpjltj'.$nb})); //键的数组
           $sjpjltj_zdlc[$nb] = self::zdlc(${'sjpjltj2'.$nb});
           foreach (${'sjpjltj'.$nb} as $key => $value) {
               ${'sjpjltjn'.$nb}[$key+1] = $value;
           }

           //Redis::command('HSET', ['sjpjltj', 'sjpjltj'.$nb, json_encode(${'sjpjltjn'.$nb})]);

            //Redis::command('HSET', ['sjpjltjwan', 'sjpjltj'.$nb, json_encode(${'sjpjltjn'.$nb})]);
            Redis::command('HSET', ['sjpjltjqian', 'sjpjltj'.$nb, json_encode(${'sjpjltjn'.$nb})]);
           
            //.................................................................3

           $sjpjlsjptj_count[$nb]  = array_count_values(${'sjpjlsjptj'.$nb})[0];
           $sjpjlsjptj_zdyl[$nb]      = max(${'sjpjlsjptj'.$nb});

           ${'sjpjlsjptj1'.$nb}     = array_merge(array_diff(${'sjpjlsjptj'.$nb}, array('0'))); //去除0
           ${'sjpjlsjptj1'.$nb.'sum'}       = array_sum(${'sjpjlsjptj1'.$nb});
           $sjpjlsjptj_pjyl[$nb]    = round(${'sjpjlsjptj1'.$nb.'sum'} /count(${'sjpjlsjptj1'.$nb}));

           ${'sjpjlsjptj2'.$nb} = array_keys(preg_grep("/^0/", ${'sjpjlsjptj'.$nb})); //键的数组
           $sjpjlsjptj_zdlc[$nb] = self::zdlc(${'sjpjlsjptj2'.$nb});

           foreach (${'sjpjlsjptj'.$nb} as $key => $value) {
               ${'sjpjlsjptjn'.$nb}[$key+1] = $value;
           }

           //Redis::command('HSET', ['sjpjlsjptj', 'sjpjlsjptj'.$nb, json_encode(${'sjpjlsjptjn'.$nb})]);

            //Redis::command('HSET', ['sjpjlsjptjwan', 'sjpjlsjptj'.$nb, json_encode(${'sjpjlsjptjn'.$nb})]);
            Redis::command('HSET', ['sjpjlsjptjqian', 'sjpjlsjptj'.$nb, json_encode(${'sjpjlsjptjn'.$nb})]);
        
           //..................................................................4
            
           $sjpjlsjp2tj_count[$nb] = array_count_values(${'sjpjlsjp2tj'.$nb})[0];
           $sjpjlsjp2tj_zdyl[$nb] = max(${'sjpjlsjp2tj'.$nb});

           ${'sjpjlsjp2tj1'.$nb}  = array_merge(array_diff(${'sjpjlsjp2tj'.$nb}, array('0'))); //去除0
           ${'sjpjlsjp2tj1'.$nb.'sum'}       = array_sum(${'sjpjlsjp2tj1'.$nb});
           $sjpjlsjp2tj_pjyl[$nb]    = round(${'sjpjlsjp2tj1'.$nb.'sum'}/count(${'sjpjlsjp2tj1'.$nb}));

           ${'sjpjlsjp2tj2'.$nb} = array_keys(preg_grep("/^0/", ${'sjpjlsjp2tj'.$nb})); //键的数组
           $sjpjlsjp2tj_zdlc[$nb] = self::zdlc(${'sjpjlsjp2tj2'.$nb});
           foreach (${'sjpjlsjp2tj'.$nb} as $key => $value) {
               ${'sjpjlsjp2tjn'.$nb}[$key+1] = $value;
           }

           //Redis::command('HSET', ['sjpjlsjp2tj', 'sjpjlsjp2tj'.$nb, json_encode(${'sjpjlsjp2tjn'.$nb})]);

            //Redis::command('HSET', ['sjpjlsjp2tjwan', 'sjpjlsjp2tj'.$nb, json_encode(${'sjpjlsjp2tjn'.$nb})]);
           Redis::command('HSET', ['sjpjlsjp2tjqian', 'sjpjlsjp2tj'.$nb, json_encode(${'sjpjlsjp2tjn'.$nb})]);
           //...................................................................5

           $sjp2tj_count[$nb] = array_count_values(${'sjp2tj'.$nb})[0];
           $sjp2tj_zdyl[$nb]     = max(${'sjp2tj'.$nb});

           ${'sjp2tj1'.$nb}           = array_merge(array_diff(${'sjp2tj'.$nb}, array('0'))); //去除0
           ${'sjp2tj1'.$nb.'sum'}        = array_sum(${'sjp2tj1'.$nb});
           $sjp2tj_pjyl[$nb]     = round(${'sjp2tj1'.$nb.'sum'}/count(${'sjp2tj1'.$nb}));

           ${'sjp2tj2'.$nb} = array_keys(preg_grep("/^0/", ${'sjp2tj'.$nb})); //键的数组
           $sjp2tj_zdlc[$nb] = self::zdlc(${'sjp2tj2'.$nb});

           foreach (${'sjp2tj'.$nb} as $key => $value) {
               ${'sjp2tjn'.$nb}[$key+1] = $value;
           }

           //Redis::command('HSET', ['sjp2tj', 'sjp2tj'.$nb, json_encode(${'sjp2tjn'.$nb})]);

            //Redis::command('HSET', ['sjp2tjwan', 'sjp2tj'.$nb, json_encode(${'sjp2tjn'.$nb})]);
           Redis::command('HSET', ['sjp2tjqian', 'sjp2tj'.$nb, json_encode(${'sjp2tjn'.$nb})]);
           //........................................................6

           $jlsjptj_count[$nb] = array_count_values(${'jlsjptj'.$nb})[0];
           $jlsjptj_zdyl[$nb]     = max(${'jlsjptj'.$nb});

           ${'jlsjptj1'.$nb}           = array_merge(array_diff(${'jlsjptj'.$nb}, array('0'))); //去除0
           ${'jlsjptj1'.$nb.'sum'}        = array_sum(${'jlsjptj1'.$nb});
           $jlsjptj_pjyl[$nb]     = round(${'jlsjptj1'.$nb.'sum'}/count(${'jlsjptj1'.$nb}));

           ${'jlsjptj2'.$nb} = array_keys(preg_grep("/^0/", ${'jlsjptj'.$nb})); //键的数组
           $jlsjptj_zdlc[$nb] = self::zdlc(${'jlsjptj2'.$nb});

           foreach (${'jlsjptj'.$nb} as $key => $value) {
               ${'jlsjptjn'.$nb}[$key+1] = $value;
           }

           //Redis::command('HSET', ['jlsjptj', 'jlsjptj'.$nb, json_encode(${'jlsjptjn'.$nb})]);

            //Redis::command('HSET', ['jlsjptjwan', 'jlsjptj'.$nb, json_encode(${'jlsjptjn'.$nb})]);
            Redis::command('HSET', ['jlsjptjqian', 'jlsjptj'.$nb, json_encode(${'jlsjptjn'.$nb})]);
            
           //........................................................7

           $jlsjpjltj_count[$nb] = array_count_values(${'jlsjpjltj'.$nb})[0];
           $jlsjpjltj_zdyl[$nb]     = max(${'jlsjpjltj'.$nb});

           ${'jlsjpjltj1'.$nb}           = array_merge(array_diff(${'jlsjpjltj'.$nb}, array('0'))); //去除0
           ${'jlsjpjltj1'.$nb.'sum'}        = array_sum(${'jlsjpjltj1'.$nb});
           $jlsjpjltj_pjyl[$nb]     = round(${'jlsjpjltj1'.$nb.'sum'}/count(${'jlsjpjltj1'.$nb}));

           ${'jlsjpjltj2'.$nb} = array_keys(preg_grep("/^0/", ${'jlsjpjltj'.$nb})); //键的数组
           $jlsjpjltj_zdlc[$nb] = self::zdlc(${'jlsjpjltj2'.$nb});

           foreach (${'jlsjpjltj'.$nb} as $key => $value) {
               ${'jlsjpjltjn'.$nb}[$key+1] = $value;
           }

           //Redis::command('HSET', ['jlsjpjltj', 'jlsjpjltj'.$nb, json_encode(${'jlsjpjltjn'.$nb})]);

            //Redis::command('HSET', ['jlsjpjltjwan', 'jlsjpjltj'.$nb, json_encode(${'jlsjpjltjn'.$nb})]);
            Redis::command('HSET', ['jlsjpjltjqian', 'jlsjpjltj'.$nb, json_encode(${'jlsjpjltjn'.$nb})]);
           
           //........................................................8

           $jlsjpjlsjptj_count[$nb] = array_count_values(${'jlsjpjlsjptj'.$nb})[0];
           $jlsjpjlsjptj_zdyl[$nb]     = max(${'jlsjpjlsjptj'.$nb});

           ${'jlsjpjlsjptj1'.$nb}           = array_merge(array_diff(${'jlsjpjlsjptj'.$nb}, array('0'))); //去除0
           ${'jlsjpjlsjptj1'.$nb.'sum'}        = array_sum(${'jlsjpjlsjptj1'.$nb});
           $jlsjpjlsjptj_pjyl[$nb]     = round(${'jlsjpjlsjptj1'.$nb.'sum'}/count(${'jlsjpjlsjptj1'.$nb}));

           ${'jlsjpjlsjptj2'.$nb} = array_keys(preg_grep("/^0/", ${'jlsjpjlsjptj'.$nb})); //键的数组
           $jlsjpjlsjptj_zdlc[$nb] = self::zdlc(${'jlsjpjlsjptj2'.$nb});

           foreach (${'jlsjpjlsjptj'.$nb} as $key => $value) {
               ${'jlsjpjlsjptjn'.$nb}[$key+1] = $value;
           }

           //Redis::command('HSET', ['jlsjpjlsjptj', 'jlsjpjlsjptj'.$nb, json_encode(${'jlsjpjlsjptjn'.$nb})]);

            //Redis::command('HSET', ['jlsjpjlsjptjwan', 'jlsjpjlsjptj'.$nb, json_encode(${'jlsjpjlsjptjn'.$nb})]);
            Redis::command('HSET', ['jlsjpjlsjptjqian', 'jlsjpjlsjptj'.$nb, json_encode(${'jlsjpjlsjptjn'.$nb})]);
           
           //..............................................................9

           $jlsjpjlsjp2tj_count[$nb] = array_count_values(${'jlsjpjlsjp2tj'.$nb})[0];
           $jlsjpjlsjp2tj_zdyl[$nb]     = max(${'jlsjpjlsjp2tj'.$nb});

           ${'jlsjpjlsjp2tj1'.$nb}          = array_merge(array_diff(${'jlsjpjlsjp2tj'.$nb}, array('0'))); //去除0
           ${'jlsjpjlsjp2tj1'.$nb.'sum'}        = array_sum(${'jlsjpjlsjp2tj1'.$nb});
           $jlsjpjlsjp2tj_pjyl[$nb]     = round(${'jlsjpjlsjp2tj1'.$nb.'sum'} /count(${'jlsjpjlsjp2tj1'.$nb}));

           ${'jlsjpjlsjp2tj2'.$nb} = array_keys(preg_grep("/^0/", ${'jlsjpjlsjp2tj'.$nb})); //键的数组
           $jlsjpjlsjp2tj_zdlc[$nb] = self::zdlc(${'jlsjpjlsjp2tj2'.$nb});

           foreach (${'jlsjpjlsjp2tj'.$nb} as $key => $value) {
               ${'jlsjpjlsjp2tjn'.$nb}[$key+1] = $value;
           }

           //Redis::command('HSET', ['jlsjpjlsjp2tj', 'jlsjpjlsjp2tj'.$nb, json_encode(${'jlsjpjlsjp2tjn'.$nb})]);

            //Redis::command('HSET', ['jlsjpjlsjp2tjwan', 'jlsjpjlsjp2tj'.$nb, json_encode(${'jlsjpjlsjp2tjn'.$nb})]);
         Redis::command('HSET', ['jlsjpjlsjp2tjqian', 'jlsjpjlsjp2tj'.$nb, json_encode(${'jlsjpjlsjp2tjn'.$nb})]);
           //..............................................................10

           $jlsjp2tj_count[$nb] = array_count_values(${'jlsjp2tj'.$nb})[0];
           $jlsjp2tj_zdyl[$nb]     = max(${'jlsjp2tj'.$nb});

           ${'jlsjp2tj1'.$nb}          = array_merge(array_diff(${'jlsjp2tj'.$nb}, array('0'))); //去除0
           ${'jlsjp2tj1'.$nb.'sum'}       = array_sum(${'jlsjp2tj1'.$nb});
           $jlsjp2tj_pjyl[$nb]    = round(${'jlsjp2tj1'.$nb.'sum'}/count(${'jlsjp2tj1'.$nb}));

           ${'jlsjp2tj2'.$nb} = array_keys(preg_grep("/^0/", ${'jlsjp2tj'.$nb})); //键的数组
           $jlsjp2tj_zdlc[$nb] = self::zdlc(${'jlsjp2tj2'.$nb});

           foreach (${'jlsjp2tj'.$nb} as $key => $value) {
               ${'jlsjp2tjn'.$nb}[$key+1] = $value;
           }

           //Redis::command('HSET', ['jlsjp2tj', 'jlsjp2tj'.$nb, json_encode(${'jlsjp2tjn'.$nb})]);

            //Redis::command('HSET', ['jlsjp2tjwan', 'jlsjp2tj'.$nb, json_encode(${'jlsjp2tjn'.$nb})]);
            Redis::command('HSET', ['jlsjp2tjqian', 'jlsjp2tj'.$nb, json_encode(${'jlsjp2tjn'.$nb})]);
           
           //..............................................................11

           $jl2sjptj_count[$nb] = array_count_values(${'jl2sjptj'.$nb})[0];
           $jl2sjptj_zdyl[$nb]     = max(${'jl2sjptj'.$nb});

           ${'jl2sjptj1'.$nb}          = array_merge(array_diff(${'jl2sjptj'.$nb}, array('0'))); //去除0
           ${'jl2sjptj1'.$nb.'sum'}     = array_sum(${'jl2sjptj1'.$nb});
           $jl2sjptj_pjyl[$nb]    = round(${'jl2sjptj1'.$nb.'sum'}/count(${'jl2sjptj1'.$nb}));

           ${'jl2sjptj2'.$nb} = array_keys(preg_grep("/^0/", ${'jl2sjptj'.$nb})); //键的数组
           $jl2sjptj_zdlc[$nb] = self::zdlc(${'jl2sjptj2'.$nb});

           foreach (${'jl2sjptj'.$nb} as $key => $value) {
               ${'jl2sjptjn'.$nb}[$key+1] = $value;
           }

           //Redis::command('HSET', ['jl2sjptj', 'jl2sjptj'.$nb, json_encode(${'jl2sjptjn'.$nb})]);

            //Redis::command('HSET', ['jl2sjptjwan', 'jl2sjptj'.$nb, json_encode(${'jl2sjptjn'.$nb})]);
            Redis::command('HSET', ['jl2sjptjqian', 'jl2sjptj'.$nb, json_encode(${'jl2sjptjn'.$nb})]);
           //.............................................................12

           $jl2sjp2tj_count[$nb] = array_count_values(${'jl2sjp2tj'.$nb})[0];
           $jl2sjp2tj_zdyl[$nb]     = max(${'jl2sjp2tj'.$nb});

           ${'jl2sjp2tj1'.$nb}          = array_merge(array_diff(${'jl2sjp2tj'.$nb}, array('0'))); //去除0
           ${'jl2sjp2tj1'.$nb.'sum'}        = array_sum(${'jl2sjp2tj1'.$nb});
           $jl2sjp2tj_pjyl[$nb]    = round(${'jl2sjp2tj1'.$nb.'sum'}/count(${'jl2sjp2tj1'.$nb}));

           ${'jl2sjp2tj2'.$nb} = array_keys(preg_grep("/^0/", ${'jl2sjp2tj'.$nb})); //键的数组
           $jl2sjp2tj_zdlc[$nb] = self::zdlc(${'jl2sjp2tj2'.$nb});

           foreach (${'jl2sjp2tj'.$nb} as $key => $value) {
               ${'jl2sjp2tjn'.$nb}[$key+1] = $value;
           }

           //Redis::command('HSET', ['jl2sjp2tj', 'jl2sjp2tj'.$nb, json_encode(${'jl2sjp2tjn'.$nb})]);

            //Redis::command('HSET', ['jl2sjp2tjwan', 'jl2sjp2tj'.$nb, json_encode(${'jl2sjp2tjn'.$nb})]);
           Redis::command('HSET', ['jl2sjp2tjqian', 'jl2sjp2tj'.$nb, json_encode(${'jl2sjp2tjn'.$nb})]);
            
           //...............................................................13

           $jl3sjptj_count[$nb] = array_count_values(${'jl3sjptj'.$nb})[0];
           $jl3sjptj_zdyl[$nb]     = max(${'jl3sjptj'.$nb});

           ${'jl3sjptj1'.$nb}          = array_merge(array_diff(${'jl3sjptj'.$nb}, array('0'))); //去除0
           ${'jl3sjptj1'.$nb.'sum'}       = array_sum(${'jl3sjptj1'.$nb});
           $jl3sjptj_pjyl[$nb]    = round(${'jl3sjptj1'.$nb.'sum'}/count(${'jl3sjptj1'.$nb}));

           ${'jl3sjptj2'.$nb} = array_keys(preg_grep("/^0/", ${'jl3sjptj'.$nb})); //键的数组
           $jl3sjptj_zdlc[$nb] = self::zdlc(${'jl3sjptj2'.$nb});

           foreach (${'jl3sjptj'.$nb} as $key => $value) {
               ${'jl3sjptjn'.$nb}[$key+1] = $value;
           }

           //Redis::command('HSET', ['jl3sjptj', 'jl3sjptj'.$nb, json_encode(${'jl3sjptjn'.$nb})]);

        //Redis::command('HSET', ['jl3sjptjwan', 'jl3sjptj'.$nb, json_encode(${'jl3sjptjn'.$nb})]);
           Redis::command('HSET', ['jl3sjptjqian', 'jl3sjptj'.$nb, json_encode(${'jl3sjptjn'.$nb})]);
          
           //..............................................................14

           $jl3sjp2tj_count[$nb] = array_count_values(${'jl3sjp2tj'.$nb})[0];
           $jl3sjp2tj_zdyl[$nb]     = max(${'jl3sjp2tj'.$nb});

           ${'jl3sjp2tj1'.$nb}          = array_merge(array_diff(${'jl3sjp2tj'.$nb}, array('0'))); //去除0
           ${'jl3sjp2tj1'.$nb.'sum'}        = array_sum(${'jl3sjp2tj1'.$nb});
           $jl3sjp2tj_pjyl[$nb]    = round(${'jl3sjp2tj1'.$nb.'sum'}/count(${'jl3sjp2tj1'.$nb}));

           ${'jl3sjp2tj2'.$nb} = array_keys(preg_grep("/^0/", ${'jl3sjp2tj'.$nb})); //键的数组
           $jl3sjp2tj_zdlc[$nb] = self::zdlc(${'jl3sjp2tj2'.$nb});

           foreach (${'jl3sjp2tj'.$nb} as $key => $value) {
               ${'jl3sjp2tjn'.$nb}[$key+1] = $value;
           }

           //Redis::command('HSET', ['jl3sjp2tj', 'jl3sjp2tj'.$nb, json_encode(${'jl3sjp2tjn'.$nb})]);

        //Redis::command('HSET', ['jl3sjp2tjwan', 'jl3sjp2tj'.$nb, json_encode(${'jl3sjp2tjn'.$nb})]);
            Redis::command('HSET', ['jl3sjp2tjqian', 'jl3sjp2tj'.$nb, json_encode(${'jl3sjp2tjn'.$nb})]);
          

           //.............................................................15

           $jl4sjptj_count[$nb] = array_count_values(${'jl4sjptj'.$nb})[0];
           $jl4sjptj_zdyl[$nb]     = max(${'jl4sjptj'.$nb});

           ${'jl4sjptj1'.$nb}          = array_merge(array_diff(${'jl4sjptj'.$nb}, array('0'))); //去除0
           ${'jl4sjptj1'.$nb.'sum'}       = array_sum(${'jl4sjptj1'.$nb});
           $jl4sjptj_pjyl[$nb]    = round(${'jl4sjptj1'.$nb.'sum'}/count(${'jl4sjptj1'.$nb}));

           ${'jl4sjptj2'.$nb} = array_keys(preg_grep("/^0/", ${'jl4sjptj'.$nb})); //键的数组
           $jl4sjptj_zdlc[$nb] = self::zdlc(${'jl4sjptj2'.$nb});

           foreach (${'jl4sjptj'.$nb} as $key => $value) {
               ${'jl4sjptjn'.$nb}[$key+1] = $value;
           }

           //Redis::command('HSET', ['jl4sjptj', 'jl4sjptj'.$nb, json_encode(${'jl4sjptjn'.$nb})]);

           //Redis::command('HSET', ['jl4sjptjwan', 'jl4sjptj'.$nb, json_encode(${'jl4sjptjn'.$nb})]);
            Redis::command('HSET', ['jl4sjptjqian', 'jl4sjptj'.$nb, json_encode(${'jl4sjptjn'.$nb})]);
           
           //.............................................................16

           $jl4sjp2tj_count[$nb] = array_count_values(${'jl4sjp2tj'.$nb})[0];
           $jl4sjp2tj_zdyl[$nb] = max(${'jl4sjp2tj'.$nb});

           ${'jl4sjp2tj1'.$nb}         = array_merge(array_diff(${'jl4sjp2tj'.$nb}, array('0'))); //去除0
           ${'jl4sjp2tj1'.$nb.'sum'}       = array_sum(${'jl4sjp2tj1'.$nb});
           $jl4sjp2tj_pjyl[$nb]    = round(${'jl4sjp2tj1'.$nb.'sum'}/count(${'jl4sjp2tj1'.$nb}));

           ${'jl4sjp2tj2'.$nb} = array_keys(preg_grep("/^0/", ${'jl4sjp2tj'.$nb})); //键的数组
           $jl4sjp2tj_zdlc[$nb] = self::zdlc(${'jl4sjp2tj2'.$nb});

           foreach (${'jl4sjp2tj'.$nb} as $key => $value) {
               ${'jl4sjp2tjn'.$nb}[$key+1] = $value;
           }

           //Redis::command('HSET', ['jl4sjp2tj', 'jl4sjp2tj'.$nb, json_encode(${'jl4sjp2tjn'.$nb})]);

            //Redis::command('HSET', ['jl4sjp2tjwan', 'jl4sjp2tj'.$nb, json_encode(${'jl4sjp2tjn'.$nb})]);
            Redis::command('HSET', ['jl4sjp2tjqian', 'jl4sjp2tj'.$nb, json_encode(${'jl4sjp2tjn'.$nb})]);
          
           //...........................................................17

           $qm012sjptj_count[$nb] = array_count_values(${'qm012sjptj'.$nb})[0];
           $qm012sjptj_zdyl[$nb] = max(${'qm012sjptj'.$nb});

           ${'qm012sjptj1'.$nb}          = array_merge(array_diff(${'qm012sjptj'.$nb}, array('0'))); //去除0
           ${'qm012sjptj1'.$nb.'sum'}       = array_sum(${'qm012sjptj1'.$nb});
           $qm012sjptj_pjyl[$nb]    = round(${'qm012sjptj1'.$nb.'sum'}/count(${'qm012sjptj1'.$nb}));

           ${'qm012sjptj2'.$nb}= array_keys(preg_grep("/^0/", ${'qm012sjptj'.$nb})); //键的数组
           $qm012sjptj_zdlc[$nb] = self::zdlc(${'qm012sjptj2'.$nb});

           foreach (${'qm012sjptj'.$nb} as $key => $value) {
               ${'qm012sjptjn'.$nb}[$key+1] = $value;
           }

           //Redis::command('HSET', ['qm012sjptj', 'qm012sjptj'.$nb, json_encode(${'qm012sjptjn'.$nb})]);

           //Redis::command('HSET', ['qm012sjptjwan', 'qm012sjptj'.$nb, json_encode(${'qm012sjptjn'.$nb})]);
        Redis::command('HSET', ['qm012sjptjqian', 'qm012sjptj'.$nb, json_encode(${'qm012sjptjn'.$nb})]);
        
           //............................................................18

           $qm012sjp2tj_count[$nb] = array_count_values(${'qm012sjp2tj'.$nb})[0];
           $qm012sjp2tj_zdyl[$nb] = max(${'qm012sjp2tj'.$nb});

           ${'qm012sjp2tj1'.$nb}          = array_merge(array_diff(${'qm012sjp2tj'.$nb}, array('0'))); //去除0
           ${'qm012sjp2tj1'.$nb.'sum'}       = array_sum(${'qm012sjp2tj1'.$nb});
           $qm012sjp2tj_pjyl[$nb]    = round(${'qm012sjp2tj1'.$nb.'sum'}/count(${'qm012sjp2tj1'.$nb}));

           ${'qm012sjp2tj2'.$nb}= array_keys(preg_grep("/^0/", ${'qm012sjp2tj'.$nb})); //键的数组
           $qm012sjp2tj_zdlc[$nb] = self::zdlc(${'qm012sjp2tj2'.$nb});

           foreach (${'qm012sjp2tj'.$nb} as $key => $value) {
               ${'qm012sjp2tjn'.$nb}[$key+1] = $value;
           }

           //Redis::command('HSET', ['qm012sjp2tj', 'qm012sjp2tj'.$nb, json_encode(${'qm012sjp2tjn'.$nb})]);

            //Redis::command('HSET', ['qm012sjp2tjwan', 'qm012sjp2tj'.$nb, json_encode(${'qm012sjp2tjn'.$nb})]);
            Redis::command('HSET', ['qm012sjp2tjqian', 'qm012sjp2tj'.$nb, json_encode(${'qm012sjp2tjn'.$nb})]);
            
           //............................................................19

           $qm012jlsjptj_count[$nb] = array_count_values(${'qm012jlsjptj'.$nb})[0];
           $qm012jlsjptj_zdyl[$nb] = max(${'qm012jlsjptj'.$nb});

           ${'qm012jlsjptj1'.$nb}          = array_merge(array_diff(${'qm012jlsjptj'.$nb}, array('0'))); //去除0
           ${'qm012jlsjptj1'.$nb.'sum'}       = array_sum(${'qm012jlsjptj1'.$nb});
           $qm012jlsjptj_pjyl[$nb]    = round(${'qm012jlsjptj1'.$nb.'sum'}/count(${'qm012jlsjptj1'.$nb}));

           ${'qm012jlsjptj2'.$nb} = array_keys(preg_grep("/^0/", ${'qm012jlsjptj'.$nb})); //键的数组
           $qm012jlsjptj_zdlc[$nb] = self::zdlc(${'qm012jlsjptj2'.$nb});

           foreach (${'qm012jlsjptj'.$nb} as $key => $value) {
               ${'qm012jlsjptjn'.$nb}[$key+1] = $value;
           }

           //Redis::command('HSET', ['qm012jlsjptj', 'qm012jlsjptj'.$nb, json_encode(${'qm012jlsjptjn'.$nb})]);

        //Redis::command('HSET', ['qm012jlsjptjwan', 'qm012jlsjptj'.$nb, json_encode(${'qm012jlsjptjn'.$nb})]);
         Redis::command('HSET', ['qm012jlsjptjqian', 'qm012jlsjptj'.$nb, json_encode(${'qm012jlsjptjn'.$nb})]);
          
           //............................................................20

           $qm012jlsjp2tj_count[$nb] = array_count_values(${'qm012jlsjp2tj'.$nb})[0];
           $qm012jlsjp2tj_zdyl[$nb] = max(${'qm012jlsjp2tj'.$nb});

           ${'qm012jlsjp2tj1'.$nb}         = array_merge(array_diff(${'qm012jlsjp2tj'.$nb}, array('0'))); //去除0
           ${'qm012jlsjp2tj1'.$nb.'sum'}       = array_sum(${'qm012jlsjp2tj1'.$nb});
           $qm012jlsjp2tj_pjyl[$nb]    = round(${'qm012jlsjp2tj1'.$nb.'sum'}/count(${'qm012jlsjp2tj1'.$nb}));

           ${'qm012jlsjp2tj2'.$nb} = array_keys(preg_grep("/^0/", ${'qm012jlsjp2tj'.$nb})); //键的数组
           $qm012jlsjp2tj_zdlc[$nb] = self::zdlc(${'qm012jlsjp2tj2'.$nb});

           foreach (${'qm012jlsjp2tj'.$nb} as $key => $value) {
               ${'qm012jlsjp2tjn'.$nb}[$key+1] = $value;
           }

           //Redis::command('HSET', ['qm012jlsjp2tj', 'qm012jlsjp2tj'.$nb, json_encode(${'qm012jlsjp2tjn'.$nb})]);

        //Redis::command('HSET', ['qm012jlsjp2tjwan', 'qm012jlsjp2tj'.$nb, json_encode(${'qm012jlsjp2tjn'.$nb})]);
        Redis::command('HSET', ['qm012jlsjp2tjqian', 'qm012jlsjp2tj'.$nb, json_encode(${'qm012jlsjp2tjn'.$nb})]);
          
           //..........................................................21

           $dxsjptj_count[$nb] = array_count_values(${'dxsjptj'.$nb})[0];
           $dxsjptj_zdyl[$nb] = max(${'dxsjptj'.$nb});

           ${'dxsjptj1'.$nb}          = array_merge(array_diff(${'dxsjptj'.$nb}, array('0'))); //去除0
           ${'dxsjptj1'.$nb.'sum'}       = array_sum(${'dxsjptj1'.$nb});
           $dxsjptj_pjyl[$nb]    = round(${'dxsjptj1'.$nb.'sum'}/count(${'dxsjptj1'.$nb}));

           ${'dxsjptj2'.$nb} = array_keys(preg_grep("/^0/", ${'dxsjptj'.$nb})); //键的数组
           $dxsjptj_zdlc[$nb] = self::zdlc(${'dxsjptj2'.$nb});

           foreach (${'dxsjptj'.$nb} as $key => $value) {
               ${'dxsjptjn'.$nb}[$key+1] = $value;
           }

           //Redis::command('HSET', ['dxsjptj', 'dxsjptj'.$nb, json_encode(${'dxsjptjn'.$nb})]);

        //Redis::command('HSET', ['dxsjptjwan', 'dxsjptj'.$nb, json_encode(${'dxsjptjn'.$nb})]);
            Redis::command('HSET', ['dxsjptjqian', 'dxsjptj'.$nb, json_encode(${'dxsjptjn'.$nb})]);
           
           //..........................................................22

           $dxsjp2tj_count[$nb] = array_count_values(${'dxsjp2tj'.$nb})[0];
           $dxsjp2tj_zdyl[$nb] = max(${'dxsjp2tj'.$nb});

           ${'dxsjp2tj1'.$nb}          = array_merge(array_diff(${'dxsjp2tj'.$nb}, array('0'))); //去除0
           ${'dxsjp2tj1'.$nb.'sum'}      = array_sum(${'dxsjp2tj1'.$nb});
           $dxsjp2tj_pjyl[$nb]    = round(${'dxsjp2tj1'.$nb.'sum'}/count(${'dxsjp2tj1'.$nb}));

           ${'dxsjp2tj2'.$nb} = array_keys(preg_grep("/^0/", ${'dxsjp2tj'.$nb})); //键的数组
           $dxsjp2tj_zdlc[$nb] = self::zdlc(${'dxsjp2tj2'.$nb});

           foreach (${'dxsjp2tj'.$nb} as $key => $value) {
               ${'dxsjp2tjn'.$nb}[$key+1] = $value;
           }

           //Redis::command('HSET', ['dxsjp2tj', 'dxsjp2tj'.$nb, json_encode(${'dxsjp2tjn'.$nb})]);

           // Redis::command('HSET', ['dxsjp2tjwan', 'dxsjp2tj'.$nb, json_encode(${'dxsjp2tjn'.$nb})]);
        Redis::command('HSET', ['dxsjp2tjqian', 'dxsjp2tj'.$nb, json_encode(${'dxsjp2tjn'.$nb})]);
           
           //..........................................................23

           $dxjlsjptj_count[$nb] = array_count_values(${'dxjlsjptj'.$nb})[0];
           $dxjlsjptj_zdyl[$nb] = max(${'dxjlsjptj'.$nb});

           ${'dxjlsjptj1'.$nb}          = array_merge(array_diff(${'dxjlsjptj'.$nb}, array('0'))); //去除0
           ${'dxjlsjptj1'.$nb.'sum'}       = array_sum(${'dxjlsjptj1'.$nb});
           $dxjlsjptj_pjyl[$nb]    = round(${'dxjlsjptj1'.$nb.'sum'}/count(${'dxjlsjptj1'.$nb}));

           ${'dxjlsjptj2'.$nb} = array_keys(preg_grep("/^0/", ${'dxjlsjptj'.$nb})); //键的数组
           $dxjlsjptj_zdlc[$nb] = self::zdlc(${'dxjlsjptj2'.$nb});

           foreach (${'dxjlsjptj'.$nb} as $key => $value) {
               ${'dxjlsjptjn'.$nb}[$key+1] = $value;
           }

        //Redis::command('HSET', ['dxjlsjptj', 'dxjlsjptj'.$nb, json_encode(${'dxjlsjptjn'.$nb})]);

        //Redis::command('HSET', ['dxjlsjptjwan', 'dxjlsjptj'.$nb, json_encode(${'dxjlsjptjn'.$nb})]);
            Redis::command('HSET', ['dxjlsjptjqian', 'dxjlsjptj'.$nb, json_encode(${'dxjlsjptjn'.$nb})]);
           
           //..........................................................24

           $dxjlsjp2tj_count[$nb] = array_count_values(${'dxjlsjp2tj'.$nb})[0];
           $dxjlsjp2tj_zdyl[$nb] = max(${'dxjlsjp2tj'.$nb});

           ${'dxjlsjp2tj1'.$nb}         = array_merge(array_diff(${'dxjlsjp2tj'.$nb}, array('0'))); //去除0
           $dxjlsjp2tj1sum       = array_sum(${'dxjlsjp2tj1'.$nb});
           $dxjlsjp2tj_pjyl[$nb]    = round($dxjlsjp2tj1sum/count(${'dxjlsjp2tj1'.$nb}));

           ${'dxjlsjp2tj2'.$nb} = array_keys(preg_grep("/^0/", ${'dxjlsjp2tj'.$nb})); //键的数组
           $dxjlsjp2tj_zdlc[$nb] = self::zdlc(${'dxjlsjp2tj2'.$nb}); 

           foreach (${'dxjlsjp2tj'.$nb} as $key => $value) {
               ${'dxjlsjp2tjn'.$nb}[$key+1] = $value;
           }

           //Redis::command('HSET', ['dxjlsjp2tj', 'dxjlsjp2tj'.$nb, json_encode(${'dxjlsjp2tjn'.$nb})]); 

        //Redis::command('HSET', ['dxjlsjp2tjwan', 'dxjlsjp2tj'.$nb, json_encode(${'dxjlsjp2tjn'.$nb})]); 
            Redis::command('HSET', ['dxjlsjp2tjqian', 'dxjlsjp2tj'.$nb, json_encode(${'dxjlsjp2tjn'.$nb})]); 
           
        }
        
        //距离
        for($nd=1;$nd<6;$nd++){
            //.....................................................25
           $jltj_count[$nd] = array_count_values(${'jltj'.$nd})[0];
           $jltj_zdyl[$nd] = max(${'jltj'.$nd});

           ${'jltj1'.$nd}          = array_merge(array_diff(${'jltj'.$nd}, array('0'))); //去除0
           ${'jltj1'.$nd.'sum'}       = array_sum(${'jltj1'.$nd});
           $jltj_pjyl[$nd]    = round(${'jltj1'.$nd.'sum'}/count(${'jltj1'.$nd}));

           ${'jltj2'.$nd} = array_keys(preg_grep("/^0/", ${'jltj'.$nd})); //键的数组
           $jltj_zdlc[$nd] = self::zdlc(${'jltj2'.$nd}); 

           foreach (${'jltj'.$nd} as $key => $value) {
               ${'jltjn'.$nd}[$key+1] = $value;
           }

           //Redis::command('HSET', ['jltj', 'jltj'.$nd, json_encode(${'jltjn'.$nd})]); 

        //Redis::command('HSET', ['jltjwan', 'jltj'.$nd, json_encode(${'jltjn'.$nd})]); 
        Redis::command('HSET', ['jltjqian', 'jltj'.$nd, json_encode(${'jltjn'.$nd})]); 
          
        }
        for($nf=1;$nf<5;$nf++){
            //......................................................26
           $jl2tj_count[$nf] = array_count_values(${'jl2tj'.$nf})[0];
           $jl2tj_zdyl[$nf] = max(${'jl2tj'.$nf});

           ${'jl2tj1'.$nf}          = array_merge(array_diff(${'jl2tj'.$nf}, array('0'))); //去除0
           ${'jl2tj1'.$nf.'sum'}      = array_sum(${'jl2tj1'.$nf});
           $jl2tj_pjyl[$nf]    = round(${'jl2tj1'.$nf.'sum'}/count(${'jl2tj1'.$nf}));

           ${'jl2tj2'.$nf} = array_keys(preg_grep("/^0/", ${'jl2tj'.$nf})); //键的数组
           $jl2tj_zdlc[$nf] = self::zdlc(${'jl2tj2'.$nf}); 

           foreach (${'jl2tj'.$nf} as $key => $value) {
               ${'jl2tjn'.$nf}[$key+1] = $value;
           }

        //Redis::command('HSET', ['jl2tj', 'jl2tj'.$nf, json_encode(${'jl2tjn'.$nf})]);  

        //Redis::command('HSET', ['jl2tjwan', 'jl2tj'.$nf, json_encode(${'jl2tjn'.$nf})]);  
            Redis::command('HSET', ['jl2tjqian', 'jl2tj'.$nf, json_encode(${'jl2tjn'.$nf})]);  
           
        }
        for($nva=1;$nva<4;$nva++){
            //............................................................27
           $jl3tj_count[$nva] = array_count_values(${'jl3tj'.$nva})[0];
           $jl3tj_zdyl[$nva] = max(${'jl3tj'.$nva});

           ${'jl3tj1'.$nva}          = array_merge(array_diff(${'jl3tj'.$nva}, array('0'))); //去除0
           ${'jl3tj1'.$nva.'sum'}       = array_sum(${'jl3tj1'.$nva});
           $jl3tj_pjyl[$nva]    = round(${'jl3tj1'.$nva.'sum'}/count(${'jl3tj1'.$nva}));

           ${'jl3tj2'.$nva} = array_keys(preg_grep("/^0/", ${'jl3tj'.$nva})); //键的数组
           $jl3tj_zdlc[$nva] = self::zdlc(${'jl3tj2'.$nva});

           foreach (${'jl3tj'.$nva} as $key => $value) {
               ${'jl3tjn'.$nva}[$key+1] = $value;
           }

           //Redis::command('HSET', ['jl3tj', 'jl3tj'.$nva, json_encode(${'jl3tjn'.$nva})]); 

        //Redis::command('HSET', ['jl3tjwan', 'jl3tj'.$nva, json_encode(${'jl3tjn'.$nva})]); 
           Redis::command('HSET', ['jl3tjqian', 'jl3tj'.$nva, json_encode(${'jl3tjn'.$nva})]); 
        }
       for($nv=1;$nv<4;$nv++){
           //..........................................................28

           $qm012tj_count[$nv] = array_count_values(${'qm012tj'.$nv})[0];
           $qm012tj_zdyl[$nv] = max(${'qm012tj'.$nv});

           ${'qm012tj1'.$nv}          = array_merge(array_diff(${'qm012tj'.$nv}, array('0'))); //去除0
           ${'qm012tj1'.$nv.'sum'}      = array_sum(${'qm012tj1'.$nv});
           $qm012tj_pjyl[$nv]    = round(${'qm012tj1'.$nv.'sum'}/count(${'qm012tj1'.$nv}));

           ${'qm012tj2'.$nv} = array_keys(preg_grep("/^0/", ${'qm012tj'.$nv})); //键的数组
           $qm012tj_zdlc[$nv] = self::zdlc(${'qm012tj2'.$nv});

           foreach (${'qm012tj'.$nv} as $key => $value) {
               ${'qm012tjn'.$nv}[$key+1] = $value;
           }

           //Redis::command('HSET', ['qm012tj', 'qm012tj'.$nv , json_encode(${'qm012tjn'.$nv})]);

        //Redis::command('HSET', ['qm012tjwan', 'qm012tj'.$nv , json_encode(${'qm012tjn'.$nv})]);
            Redis::command('HSET', ['qm012tjqian', 'qm012tj'.$nv , json_encode(${'qm012tjn'.$nv})]);

           //..........................................................29

           $dxtj_count[$nv] = array_count_values(${'dxtj'.$nv})[0];
           $dxtj_zdyl[$nv] = max(${'dxtj'.$nv});

           ${'dxtj1'.$nv}          = array_merge(array_diff(${'dxtj'.$nv}, array('0'))); //去除0
           ${'dxtj1'.$nv.'sum'}       = array_sum(${'dxtj1'.$nv});
           $dxtj_pjyl[$nv]    = round(${'dxtj1'.$nv.'sum'}/count(${'dxtj1'.$nv}));

           ${'dxtj2'.$nv} = array_keys(preg_grep("/^0/", ${'dxtj'.$nv})); //键的数组
           $dxtj_zdlc[$nv] = self::zdlc(${'dxtj2'.$nv});

           foreach (${'dxtj'.$nv} as $key => $value) {
               ${'dxtjn'.$nv}[$key+1] = $value;
           }
           //Redis::command('HSET', ['dxtj', 'dxtj'.$nv , json_encode(${'dxtjn'.$nv})]);

        //Redis::command('HSET', ['dxtjwan', 'dxtj'.$nv , json_encode(${'dxtjn'.$nv})]);
            Redis::command('HSET', ['dxtjqian', 'dxtj'.$nv , json_encode(${'dxtjn'.$nv})]);
           //.........................................................30

           $dxjltj_count[$nv] = array_count_values(${'dxjltj'.$nv})[0];
           $dxjltj_zdyl[$nv] = max(${'dxjltj'.$nv});

           ${'dxjltj1'.$nv}          = array_merge(array_diff(${'dxjltj'.$nv}, array('0'))); //去除0
           ${'dxjltj1'.$nv.'sum'}       = array_sum(${'dxjltj1'.$nv});
           $dxjltj_pjyl[$nv]    = round(${'dxjltj1'.$nv.'sum'}/count(${'dxjltj1'.$nv}));

           ${'dxjltj2'.$nv} = array_keys(preg_grep("/^0/", ${'dxjltj'.$nv})); //键的数组
           $dxjltj_zdlc[$nv] = self::zdlc(${'dxjltj2'.$nv});

           foreach (${'dxjltj'.$nv} as $key => $value) {
               ${'dxjltjn'.$nv}[$key+1] = $value;
           }
           //Redis::command('HSET', ['dxjltj', 'dxjltj'.$nv , json_encode(${'dxjltjn'.$nv})]);

        //Redis::command('HSET', ['dxjltjwan', 'dxjltj'.$nv , json_encode(${'dxjltjn'.$nv})]);
        Redis::command('HSET', ['dxjltjqian', 'dxjltj'.$nv , json_encode(${'dxjltjn'.$nv})]);
          
           //.........................................................31

           $qm012jltj_count[$nv] = array_count_values(${'qm012jltj'.$nv})[0];
           $qm012jltj_zdyl[$nv] = max(${'qm012jltj'.$nv});

           ${'qm012jltj1'.$nv}          = array_merge(array_diff(${'qm012jltj'.$nv}, array('0'))); //去除0
           ${'qm012jltj1'.$nv.'sum'}      = array_sum(${'qm012jltj1'.$nv});
           $qm012jltj_pjyl[$nv]    = round(${'qm012jltj1'.$nv.'sum'}/count(${'qm012jltj1'.$nv}));

           ${'qm012jltj2'.$nv} = array_keys(preg_grep("/^0/", ${'qm012jltj'.$nv})); //键的数组
           $qm012jltj_zdlc[$nv] = self::zdlc(${'qm012jltj2'.$nv});

           foreach (${'qm012jltj'.$nv} as $key => $value) {
               ${'qm012jltjn'.$nv}[$key+1] = $value;
           }
           //Redis::command('HSET', ['qm012jltj', 'qm012jltj'.$nv , json_encode(${'qm012jltjn'.$nv})]);

            //Redis::command('HSET', ['qm012jltjwan', 'qm012jltj'.$nv , json_encode(${'qm012jltjn'.$nv})]);
            Redis::command('HSET', ['qm012jltjqian', 'qm012jltj'.$nv , json_encode(${'qm012jltjn'.$nv})]);
            
        }
        for($nt=1;$nt<3;$nt++){
            //........................................................32
           $jl4tj_count[$nt] = array_count_values(${'jl4tj'.$nt})[0];
           $jl4tj_zdyl[$nt] = max(${'jl4tj'.$nt});

           ${'jl4tj1'.$nt}         = array_merge(array_diff(${'jl4tj'.$nt}, array('0'))); //去除0
           ${'jl4tj1'.$nt.'sum'}      = array_sum(${'jl4tj1'.$nt});
           $jl4tj_pjyl[$nt]    = round(${'jl4tj1'.$nt.'sum'}/count(${'jl4tj1'.$nt}));

           ${'jl4tj2'.$nt} = array_keys(preg_grep("/^0/", ${'jl4tj'.$nt})); //键的数组
           $jl4tj_zdlc[$nt] = self::zdlc(${'jl4tj2'.$nt});

           foreach (${'jl4tj'.$nt} as $key => $value) {
               ${'jl4tjn'.$nt}[$key+1] = $value;
           }
           //Redis::command('HSET', ['jl4tj', 'jl4tj'.$nt , json_encode(${'jl4tjn'.$nt})]);

        //Redis::command('HSET', ['jl4tjwan', 'jl4tj'.$nt , json_encode(${'jl4tjn'.$nt})]);
            Redis::command('HSET', ['jl4tjqian', 'jl4tj'.$nt , json_encode(${'jl4tjn'.$nt})]);
           
        }
        //.............0
        $counts['zx120'] = $zxtj_count;
        $zdyls ['zx120'] = $zxtj_zdyl;
        $pjyls ['zx120'] = $zxtj_pjyl;
        $zdlcs ['zx120'] = $zxtj_zdlc;
        //.............1
        $counts['sjp'] = $sjptj_count;
        $zdyls ['sjp'] = $sjptj_zdyl;
        $pjyls ['sjp'] = $sjptj_pjyl;
        $zdlcs ['sjp'] = $sjptj_zdlc;
        //.............2
        $counts['sjpjl'] = $sjpjltj_count;
        $zdyls ['sjpjl'] = $sjpjltj_zdyl;
        $pjyls ['sjpjl'] = $sjpjltj_pjyl;
        $zdlcs ['sjpjl'] = $sjpjltj_zdlc;
        //.............3
        $counts['sjpjlsjp'] = $sjpjlsjptj_count;
        $zdyls ['sjpjlsjp'] = $sjpjlsjptj_zdyl;
        $pjyls ['sjpjlsjp'] = $sjpjlsjptj_pjyl;
        $zdlcs ['sjpjlsjp'] = $sjpjlsjptj_zdlc;
        //.............4
        $counts['sjpjlsjp2'] = $sjpjlsjp2tj_count;
        $zdyls ['sjpjlsjp2'] = $sjpjlsjp2tj_zdyl;
        $pjyls ['sjpjlsjp2'] = $sjpjlsjp2tj_pjyl;
        $zdlcs ['sjpjlsjp2'] = $sjpjlsjp2tj_zdlc;
        //.............5
        $counts['sjp2'] = $sjp2tj_count;
        $zdyls ['sjp2'] = $sjp2tj_zdyl;
        $pjyls ['sjp2'] = $sjp2tj_pjyl;
        $zdlcs ['sjp2'] = $sjp2tj_zdlc;
        //.............6
        $counts['jl'] = $jltj_count;
        $zdyls ['jl'] = $jltj_zdyl;
        $pjyls ['jl'] = $jltj_pjyl;
        $zdlcs ['jl'] = $jltj_zdlc;
        //.............7
        $counts['jlsjp'] = $jlsjptj_count;
        $zdyls ['jlsjp'] = $jlsjptj_zdyl;
        $pjyls ['jlsjp'] = $jlsjptj_pjyl;
        $zdlcs ['jlsjp'] = $jlsjptj_zdlc;
        //.............8
        $counts['jlsjpjl'] = $jlsjpjltj_count;
        $zdyls ['jlsjpjl'] = $jlsjpjltj_zdyl;
        $pjyls ['jlsjpjl'] = $jlsjpjltj_pjyl;
        $zdlcs ['jlsjpjl'] = $jlsjpjltj_zdlc;
        //.............9
        $counts['jlsjpjlsjp'] = $jlsjpjlsjptj_count;
        $zdyls ['jlsjpjlsjp'] = $jlsjpjlsjptj_zdyl;
        $pjyls ['jlsjpjlsjp'] = $jlsjpjlsjptj_pjyl;
        $zdlcs ['jlsjpjlsjp'] = $jlsjpjlsjptj_zdlc;
        //.............10
        $counts['jlsjpjlsjp2'] = $jlsjpjlsjp2tj_count;
        $zdyls ['jlsjpjlsjp2'] = $jlsjpjlsjp2tj_zdyl;
        $pjyls ['jlsjpjlsjp2'] = $jlsjpjlsjp2tj_pjyl;
        $zdlcs ['jlsjpjlsjp2'] = $jlsjpjlsjp2tj_zdlc;
        //.............11
        $counts['jlsjp2'] = $jlsjp2tj_count;
        $zdyls ['jlsjp2'] = $jlsjp2tj_zdyl;
        $pjyls ['jlsjp2'] = $jlsjp2tj_pjyl;
        $zdlcs ['jlsjp2'] = $jlsjp2tj_zdlc;
        //.............12
        $counts['jl2'] = $jl2tj_count;
        $zdyls ['jl2'] = $jl2tj_zdyl;
        $pjyls ['jl2'] = $jl2tj_pjyl;
        $zdlcs ['jl2'] = $jl2tj_zdlc;
        //.............13
        $counts['jl2sjp'] = $jl2sjptj_count;
        $zdyls ['jl2sjp'] = $jl2sjptj_zdyl;
        $pjyls ['jl2sjp'] = $jl2sjptj_pjyl;
        $zdlcs ['jl2sjp'] = $jl2sjptj_zdlc;
        //.............14
        $counts['jl2sjp2'] = $jl2sjp2tj_count;
        $zdyls ['jl2sjp2'] = $jl2sjp2tj_zdyl;
        $pjyls ['jl2sjp2'] = $jl2sjp2tj_pjyl;
        $zdlcs ['jl2sjp2'] = $jl2sjp2tj_zdlc;
        //.............15
        $counts['jl3'] = $jl3tj_count;
        $zdyls ['jl3'] = $jl3tj_zdyl;
        $pjyls ['jl3'] = $jl3tj_pjyl;
        $zdlcs ['jl3'] = $jl3tj_zdlc;
        //.............16
        $counts['jl3sjp'] = $jl3sjptj_count;
        $zdyls ['jl3sjp'] = $jl3sjptj_zdyl;
        $pjyls ['jl3sjp'] = $jl3sjptj_pjyl;
        $zdlcs ['jl3sjp'] = $jl3sjptj_zdlc;
        //.............17
        $counts['jl3sjp2'] = $jl3sjp2tj_count;
        $zdyls ['jl3sjp2'] = $jl3sjp2tj_zdyl;
        $pjyls ['jl3sjp2'] = $jl3sjp2tj_pjyl;
        $zdlcs ['jl3sjp2'] = $jl3sjp2tj_zdlc;
        //.............18
        $counts['jl4'] = $jl4tj_count;
        $zdyls ['jl4'] = $jl4tj_zdyl;
        $pjyls ['jl4'] = $jl4tj_pjyl;
        $zdlcs ['jl4'] = $jl4tj_zdlc;
        //.............19
        $counts['jl4sjp'] = $jl4sjptj_count;
        $zdyls ['jl4sjp'] = $jl4sjptj_zdyl;
        $pjyls ['jl4sjp'] = $jl4sjptj_pjyl;
        $zdlcs ['jl4sjp'] = $jl4sjptj_zdlc;
        //.............20
        $counts['jl4sjp2'] = $jl4sjp2tj_count;
        $zdyls ['jl4sjp2'] = $jl4sjp2tj_zdyl;
        $pjyls ['jl4sjp2'] = $jl4sjp2tj_pjyl;
        $zdlcs ['jl4sjp2'] = $jl4sjp2tj_zdlc;
        //.............21
        $counts['qm012'] = $qm012tj_count;
        $zdyls ['qm012'] = $qm012tj_zdyl;
        $pjyls ['qm012'] = $qm012tj_pjyl;
        $zdlcs ['qm012'] = $qm012tj_zdlc;
        //.............22
        $counts['qm012sjp'] = $qm012sjptj_count;
        $zdyls ['qm012sjp'] = $qm012sjptj_zdyl;
        $pjyls ['qm012sjp'] = $qm012sjptj_pjyl;
        $zdlcs ['qm012sjp'] = $qm012sjptj_zdlc;
        //.............23
        $counts['qm012sjp2'] = $qm012sjp2tj_count;
        $zdyls ['qm012sjp2'] = $qm012sjp2tj_zdyl;
        $pjyls ['qm012sjp2'] = $qm012sjp2tj_pjyl;
        $zdlcs ['qm012sjp2'] = $qm012sjp2tj_zdlc;
        //.............24
        $counts['qm012jl'] = $qm012jltj_count;
        $zdyls ['qm012jl'] = $qm012jltj_zdyl;
        $pjyls ['qm012jl'] = $qm012jltj_pjyl;
        $zdlcs ['qm012jl'] = $qm012jltj_zdlc;
        //.............25
        $counts['qm012jlsjp'] = $qm012jlsjptj_count;
        $zdyls ['qm012jlsjp'] = $qm012jlsjptj_zdyl;
        $pjyls ['qm012jlsjp'] = $qm012jlsjptj_pjyl;
        $zdlcs ['qm012jlsjp'] = $qm012jlsjptj_zdlc;
        //.............26
        $counts['qm012jlsjp2'] = $qm012jlsjp2tj_count;
        $zdyls ['qm012jlsjp2'] = $qm012jlsjp2tj_zdyl;
        $pjyls ['qm012jlsjp2'] = $qm012jlsjp2tj_pjyl;
        $zdlcs ['qm012jlsjp2'] = $qm012jlsjp2tj_zdlc;
        //.............27
        $counts['dx'] = $dxtj_count;
        $zdyls ['dx'] = $dxtj_zdyl;
        $pjyls ['dx'] = $dxtj_pjyl;
        $zdlcs ['dx'] = $dxtj_zdlc;
        //.............28
        $counts['dxsjp'] = $dxsjptj_count;
        $zdyls ['dxsjp'] = $dxsjptj_zdyl;
        $pjyls ['dxsjp'] = $dxsjptj_pjyl;
        $zdlcs ['dxsjp'] = $dxsjptj_zdlc;
        //.............29
        $counts['dxsjp2'] = $dxsjp2tj_count;
        $zdyls ['dxsjp2'] = $dxsjp2tj_zdyl;
        $pjyls ['dxsjp2'] = $dxsjp2tj_pjyl;
        $zdlcs ['dxsjp2'] = $dxsjp2tj_zdlc;
        //.............30
        $counts['dxjl'] = $dxjltj_count;
        $zdyls ['dxjl'] = $dxjltj_zdyl;
        $pjyls ['dxjl'] = $dxjltj_pjyl;
        $zdlcs ['dxjl'] = $dxjltj_zdlc;
        //.............31
        $counts['dxjlsjp'] = $dxjlsjptj_count;
        $zdyls ['dxjlsjp'] = $dxjlsjptj_zdyl;
        $pjyls ['dxjlsjp'] = $dxjlsjptj_pjyl;
        $zdlcs ['dxjlsjp'] = $dxjlsjptj_zdlc;
        //.............32
        $counts['dxjlsjp2'] = $dxjlsjp2tj_count;
        $zdyls ['dxjlsjp2'] = $dxjlsjp2tj_zdyl;
        $pjyls ['dxjlsjp2'] = $dxjlsjp2tj_pjyl;
        $zdlcs ['dxjlsjp2'] = $dxjlsjp2tj_zdlc;
        
        $counttj = json_encode($counts);
        $zdyltj  = json_encode($zdyls);
        $pjyltj  = json_encode($pjyls);
        $zdlctj  = json_encode($zdlcs);

        //Redis::command('HSET', ['tongji', 'count', $counttj]);

         //Redis::command('HSET', ['tongjiwan', 'count', $counttj]);
         Redis::command('HSET', ['tongjiqian', 'count', $counttj]);
        

        //Redis::command('HSET', ['tongji', 'zdyl', $zdyltj]);

         //Redis::command('HSET', ['tongjiwan', 'zdyl', $zdyltj]);
         Redis::command('HSET', ['tongjiqian', 'zdyl', $zdyltj]);
         

        //Redis::command('HSET', ['tongji', 'pjyl', $pjyltj]);

         //Redis::command('HSET', ['tongjiwan', 'pjyl', $pjyltj]);
         Redis::command('HSET', ['tongjiqian', 'pjyl', $pjyltj]);


        //Redis::command('HSET', ['tongji', 'zdlc', $zdlctj]);

    //Redis::command('HSET', ['tongjiwan', 'zdlc', $zdlctj]);
         Redis::command('HSET', ['tongjiqian', 'zdlc', $zdlctj]);
       

        //$bnb = Redis::HGETALL('tongji');
        //$bna = Redis::HGETALL('yilou');
        //ksort($bna);
        //echo "<pre>";
        //print_r(ksort($bn));
       // print_r($bnb);
        //echo "<br>";
        //print_r($bna);
	}
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
