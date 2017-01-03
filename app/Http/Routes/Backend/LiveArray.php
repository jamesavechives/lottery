<?php

$router->group(['namespace' => 'Charts'], function () use ($router) {
    $router->group(['middleware' => 'access.routeNeedsPermission:create-livearray'], function () use ($router) {
        get('livearray/create','LiveArrayController@create')->name('admin.livearray.create');
        post('livearray/store','LiveArrayController@store')->name('admin.livearray.store');
    });
    $router->group(['middleware' => 'access.routeNeedsPermission:edit-livearray'], function () use ($router) {
        get('livearray/edit/{id}','LiveArrayController@edit')->name('admin.livearray.edit');
        post('livearray/update/{id}','LiveArrayController@update')->name('admin.livearray.update');
    });
    $router->group(['middleware' => 'access.routeNeedsPermission:delete-liveArray'], function () use ($router) {
        get('livearray/delet/{id}','LiveArrayController@destroy')->name('admin.livearray.delet');
    });
    get('livearray/index','LiveArrayController@index')->name('admin.livearray.index');
});