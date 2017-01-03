<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redis as Redis;

class LogInInfo{

    public function handle($request, Closure $next){
        $redis = Redis::connection('cache');

        if($redis->hExists($request->name, $request->name)){
            return redirect()->back()->withInput()->withFlashDanger('您的账号已经登陆！请确认是否已退出或考虑账号是否安全');
        }else{
            return $next($request);
        }
    }
}
