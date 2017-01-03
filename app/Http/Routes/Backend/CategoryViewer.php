<?php

$router->group(['namespace' => 'Category'], function () use ($router) {
    $router->group(['middleware' => 'access.routeNeedsPermission:create-article'], function () use ($router) {
    	get('category/create','CategoryController@create')->name('admin.category.create');
    	post('category/store','CategoryController@store')->name('admin.category.store');
    });
    $router->group(['middleware' => 'access.routeNeedsPermission:edit-article'], function () use ($router) {
    	get('category/edit/{id}','CategoryController@edit')->name('admin.category.edit');
    	post('category/update/{id}','CategoryController@update')->name('admin.category.update');
    });
    $router->group(['middleware' => 'access.routeNeedsPermission:delete-article'], function () use ($router) {
    	get('category/delet/{id}','CategoryController@destroy')->name('admin.category.delet');
    });
    get('category/index','CategoryController@index')->name('admin.category.index');   
});