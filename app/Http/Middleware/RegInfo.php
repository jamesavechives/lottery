<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Access\User\User;

class RegInfo{

    public function handle($request, Closure $next){

        if(User::where('name',$request->name)->count() == 0 && User::where('email',$request->email)->count() == 0){
            return $next($request);
        }else{
            return redirect()->back()->withInput()->withFlashDanger('该用户已经存在！');
        }
    }
}
