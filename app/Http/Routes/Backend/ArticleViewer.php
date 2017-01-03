<?php

$router->group(['namespace' => 'Article'], function () use ($router) {
    $router->group(['middleware' => 'access.routeNeedsPermission:create-article'], function () use ($router) {
    	get('article/create','ArticleController@create')->name('admin.article.create');
    	post('article/store','ArticleController@store')->name('admin.article.store');
    });
    $router->group(['middleware' => 'access.routeNeedsPermission:edit-article'], function () use ($router) {
    	get('article/edit/{id}','ArticleController@edit')->name('admin.article.edit');
    	post('article/update/{id}','ArticleController@update')->name('admin.article.update');
    });
    $router->group(['middleware' => 'access.routeNeedsPermission:delete-article'], function () use ($router) {
    	get('article/delet/{id}','ArticleController@destroy')->name('admin.article.delet');
    });
    get('article/index','ArticleController@index')->name('admin.article.index');
});