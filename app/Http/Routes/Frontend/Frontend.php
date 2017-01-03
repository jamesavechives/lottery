<?php

/**
 * Frontend Controllers
 */
get('article/cat/{id}','ArticleController@cates');
get('article/info/{id}','ArticleController@info');
get('/', 'FrontendController@index')->name('home');
$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->group(['middleware' => 'access.routeNeedsPermission:show-frontview'], function () use ($router) {
        get('zst/{name}/{qishu}','ZstController@show');
        get('zst/cqssc/zxzs/20/','ZstController@showdata');
        get('zst/cqssc/statarr/20/','ZstController@showstatarr');
		get('zst/cqssc/livearr/20/','ZstController@showlivearr');
        get('zst/cqssc/cmzs/20/','ZstController@showdata');

        //ajax

		// 1，ajax 数据统计 -- 出现次数/最大遗漏/最大连出等
		get('zst/sjtj/','ZstController@datatj');
		// 2，ajax倒计时设置
		get('zst/xqtime/','ZstController@timeset');
		// 3，ajax数据传递
		get('zst/data/','ZstController@data');
		// 4，胆码/号码组
		get('zst/danma/','ZstController@danma');
		// 5，组选120/60...
		get('zst/zuxuan/','ZstController@zuxuan');
		// 6，组选120/60...
		post('zst/zuxuaninfo/','ZstController@zuxuaninfo');
		//静态数组
        get('zst/statarrinfo/','ZstController@statarrinfo');
		//动态数组
		get('zst/livearrinfo/','ZstController@livearrinfo');
		/*
		Route::post('zst/zuxuaninfo/',[
		   'middleware' => 'First',
		   'uses' => 'ZstController@zuxuaninfo'
		]);
		*/

		post('zst/zuxuanexptj/','ZstController@zuxuanexptj');
		post('zst/zuxuanexptj2/','ZstController@zuxuanexptj2');
		post('zst/zuxuanexptj3/','ZstController@zuxuanexptj3');
		post('zst/zuxuanexptj4/','ZstController@zuxuanexptj4');

		//
		post('ajax/makedata/','MakeredisController@makedata');
                
		//ajax

		//统计信息
		//get('ajax/tongji/','TjController@data');
		/*get('ajax/tongjiwan/','TjwanController@data');
		get('ajax/tongjiqian/','TjqianController@data');
		get('ajax/tongjibai/','TjbaiController@data');
		get('ajax/tongjishi/','TjshiController@data');
		get('ajax/tongjige/','TjgeController@data');*/
    });
});
/**
 * These frontend controllers require the user to be logged in
 */
$router->group(['middleware' => 'auth'], function () use ($router){
    get('dashboard', 'DashboardController@index')->name('frontend.dashboard');
    get('profile/edit', 'ProfileController@edit')->name('frontend.profile.edit');
    patch('profile/update', 'ProfileController@update')->name('frontend.profile.update');
});
