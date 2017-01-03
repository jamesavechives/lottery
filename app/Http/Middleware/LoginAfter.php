<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Access\User\User;

class LoginAfter
{
    public function handle($request, Closure $next){
        $response = $next($request);
        //access()->user()->gold;
        // 执行扣除金币动作
        if(access()->hasRole('VIP金牌会员（包年）') || access()->hasRole('金牌会员（包季）') || access()->hasRole('银牌会员（包月）')){//获取权限
            //取得充值金币到期的时间
            $gold_end_time   = access()->user()->gold_end_time;
            $last_logout_time = access()->user()->last_logout_time;
            //当前时间与充值金币到期时间的距离
            $shengyu = strtotime($gold_end_time) - time();
            //当前时间与上次登陆时间的距离
            $login_time_juli = time() - strtotime($last_logout_time);
            //是否扣除金币
            if($shengyu <= 0){
                $user = User::find(access()->user()->id);
                $user->gold = '0';
                $user->save();
            }elseif($login_time_juli >= 86400){
                $user = User::find(access()->user()->id);
                $user->gold = ($user->gold-1);
                $user->save();
            }
        }elseif(access()->hasRole('铜牌会员（按次数）')){
            $last_logout_time = access()->user()->last_logout_time;
            $login_time_juli = time() - strtotime($last_logout_time);

            if($login_time_juli >= 86400){
                $user = User::find(access()->user()->id);
                $user->gold = ($user->gold-1);
                $user->save();
            }
        }
        return $response;
    }
}

