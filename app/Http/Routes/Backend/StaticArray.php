<?php

$router->group(['namespace' => 'Charts'], function () use ($router) {
    $router->group(['middleware' => 'access.routeNeedsPermission:create-staticarray'], function () use ($router) {
        get('staticarray/create','StaticArrayController@create')->name('admin.staticarray.create');
        post('staticarray/store','StaticArrayController@store')->name('admin.staticarray.store');
    });
    $router->group(['middleware' => 'access.routeNeedsPermission:edit-staticarray'], function () use ($router) {
        get('staticarray/edit/{id}','StaticArrayController@edit')->name('admin.staticarray.edit');
        post('staticarray/update/{id}','StaticArrayController@update')->name('admin.staticarray.update');
    });
    $router->group(['middleware' => 'access.routeNeedsPermission:delete-staticarray'], function () use ($router) {
        get('staticarray/delet/{id}','StaticArrayController@destroy')->name('admin.staticarray.delet');
    });
    get('staticarray/index','StaticArrayController@index')->name('admin.staticarray.index');
    get('staticarray/show/{id}','StaticArrayController@show')->name('admin.staticarray.show');
    get('staticarray/chird/{name}/{id}','StaticArrayController@chird')->name('admin.staticarray.chird');
    post('staticarray/change/{id}','StaticArrayController@change')->name('admin.staticarray.change');
});