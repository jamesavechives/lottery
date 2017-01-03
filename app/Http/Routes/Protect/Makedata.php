<?php

$router->group(['namespace' => 'Makedata'], function () use ($router) {
        get('makeinfo/index/{title}/{begin}/{count}/{type}','MakeRedisInfoController@index')->name('protect.makeinfo.index');
});