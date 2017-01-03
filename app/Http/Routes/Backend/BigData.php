<?php

$router->group(['namespace' => 'Charts'], function () use ($router) {
    $router->group(['middleware' => 'access.routeNeedsPermission:active-bigdata'], function () use ($router) {
        get('bigdata/index','BigDataController@index')          ->name('admin.bigdata.index');
        get('bigdata/edit/{id}','BigDataController@edit')       ->name('admin.bigdata.edit');
        post('bigdata/store','BigDataController@store')         ->name('admin.bigdata.store');
    });
});