<?php

$router->group(['namespace' => 'Makedata'], function () use ($router) {
    get('makeliveinfo/index/{count}/{type}','MakeLiveRedisInfoController@index')->name('protect.makeliveinfo.index');
});