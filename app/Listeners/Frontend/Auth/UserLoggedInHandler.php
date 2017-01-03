<?php

namespace App\Listeners\Frontend\Auth;

use App\Events\Frontend\Auth\UserLoggedIn;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Redis as Redis;
use Request;

/**
 * Class UserLoggedInHandler
 * @package App\Listeners\Frontend\Auth
 */
class UserLoggedInHandler implements ShouldQueue{

    use InteractsWithQueue;

    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct(){
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserLoggedIn $event
     * @return void
     */
    public function handle(UserLoggedIn $event){

        access()->user()->last_login_time = date("Y-m-d H:i:s",time());

        access()->user()->save();

        $redis = Redis::connection('cache');

        $user_info['id']     =  $event->user->id;
        $user_info['name']   =  $event->user->name;
        $user_info['ip']     =  Request::getClientIp();
        $user_info_json      =  json_encode($user_info);

        $redis->hset($event->user->name, $event->user->name ,$user_info_json);

        $redis->expireAt($event->user->name, time() + 86400);

        \Log::info('User Logged In: ' . $event->user->name);
    }
}
