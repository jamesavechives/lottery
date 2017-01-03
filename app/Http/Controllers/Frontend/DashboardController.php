<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Carbon\Carbon as Carbon;
use App\Models\Wish\Wish;
/**
 * Class DashboardController
 * @package App\Http\Controllers\Frontend
 */
class DashboardController extends Controller{
    /**
     * @return mixed
     */
    public function index(){

        $wish = Wish::where('begin','<=',date('Y-m-d',strtotime(Carbon::now())))
            ->where('end','>',date('Y-m-d',strtotime(Carbon::now())))
            ->get()->toArray();

        return view('frontend.user.dashboard',['wish' => $wish])
            ->withUser(access()->user());
    }
}
