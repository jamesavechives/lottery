<?php

$router->group(['namespace' => 'Wishes'], function () use ($router) {
    $router->group(['middleware' => 'access.routeNeedsPermission:create-Wishes'], function () use ($router) {
    	get('wishes/create','wishesController@create')->name('admin.wishes.create');
    	post('wishes/store','wishesController@store')->name('admin.wishes.store');
    });
    $router->group(['middleware' => 'access.routeNeedsPermission:edit-Wishes'], function () use ($router) {
    	get('wishes/edit/{id}','wishesController@edit')->name('admin.wishes.edit');
    	post('wishes/update/{id}','wishesController@update')->name('admin.wishes.update');
    });
    $router->group(['middleware' => 'access.routeNeedsPermission:delete-Wishes'], function () use ($router) {
    	get('wishes/delet/{id}','wishesController@destroy')->name('admin.wishes.delet');
    });
    get('wishes/index','wishesController@index')->name('admin.wishes.index');  
});