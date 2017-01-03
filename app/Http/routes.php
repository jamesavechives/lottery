<?php

/**
 * 选择语言
 */
$router->group(['namespace' => 'Language'], function () use ($router) {
    require (__DIR__ . '/Routes/Language/Lang.php');
});

/**
 * 前端路由
 */
$router->group(['namespace' => 'Frontend'], function () use ($router) {
    require (__DIR__ . '/Routes/Frontend/Frontend.php');
    require (__DIR__ . '/Routes/Frontend/Access.php');
});

/**
 * 后端路由
 */
$router->group(['namespace' => 'Backend'], function () use ($router) {
    $router->group(['prefix' => 'admin', 'middleware' => 'auth'], function () use ($router) {
        $router->group(['middleware' => 'access.routeNeedsPermission:view-backend'], function () use ($router) {
            require (__DIR__ . '/Routes/Backend/Dashboard.php');
            require (__DIR__ . '/Routes/Backend/Access.php');
            require (__DIR__ . '/Routes/Backend/LogViewer.php');
            require (__DIR__ . '/Routes/Backend/wishesViewer.php');
            require (__DIR__ . '/Routes/Backend/ArticleViewer.php');
            require (__DIR__ . '/Routes/Backend/CategoryViewer.php');
            require (__DIR__ . '/Routes/Backend/StaticArray.php');
            require (__DIR__ . '/Routes/Backend/LiveArray.php');
            require (__DIR__ . '/Routes/Backend/BigData.php');
            require (__DIR__ . '/Routes/Protect/Makedata.php');
        });
    });
});

$router->group(['namespace' => 'Protect'], function () use ($router) {
    $router->group(['prefix' => 'protect', 'middleware' => 'auth'], function () use ($router) {
        require (__DIR__ . '/Routes/Protect/Makedata.php');
        require (__DIR__ . '/Routes/Protect/MakeLivedata.php');
    });
});
