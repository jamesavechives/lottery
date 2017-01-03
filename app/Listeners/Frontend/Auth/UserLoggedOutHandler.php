<?php

namespace App\Listeners\Frontend\Auth;

use App\Events\Frontend\Auth\UserLoggedOut;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Redis as Redis;

/**
 * Class UserLoggedOutHandler
 * @package App\Listeners\Frontend\Auth
 */
class UserLoggedOutHandler implements ShouldQueue{

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
     * @param  UserLoggedOut $event
     * @return void
     */
    public function handle(UserLoggedOut $event){

        access()->user()->last_logout_time = date("Y-m-d H:i:s",time());

        access()->user()->save();

        $redis = Redis::connection('cache');

        $redis->hdel($event->user->name, $event->user->name);

        \Log::info('User Logged Out: ' . $event->user->name);
    }
}
