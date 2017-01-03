<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Access\User\User;
use App\Models\Article\Article;
use Illuminate\Support\Facades\Redis as Redis;

/**
 * Class DashboardController
 * @package App\Http\Controllers\Backend
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $redis = Redis::connection('cache');

        $info['new_user']       = User::where('status','0')->count();
        $info['all_article']    = Article::count();
        $info['all_online']     = $redis->dbSize();;

        return view('backend.dashboard',['info'=>$info]);
    }
}
