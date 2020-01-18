<?php
return  array(
    // Admin Routes
    '/admin' => [
        'method' => 'get',
        'target' => 'Admin\DashboardController@index',

    ],
    '/admin/message' => [
        'method' => 'post',
        'target' => 'Admin\DashboardController@message',
    ],
    '/admin/logout' => [
        'method' => 'get',
        'target' => 'Admin\DashboardController@logout',
        'middleware' => 'AdminPanelGuard'
    ],
    '/admin/category/edit' => [
        'method' => 'get',
        'target' => 'Admin\CatController@edit',
        'middleware' => 'AdminPanelGuard'
    ],
    '/admin/category/ajaxSave' => [
        'method' => 'post',
        'target' => 'Admin\CatController@ajaxSave',
    ],
    '/admin/category/delete' => [
        'method' => 'get',
        'target' => 'Admin\CatController@delete',
        'middleware' => 'AdminPanelGuard'
    ],
    '/admin/users/delete' => [
        'method' => 'get',
        'target' => 'Admin\UserController@delete',
        'middleware' => 'AdminPanelGuard'
    ],
    '/admin/photographers/delete' => [
        'method' => 'get',
        'target' => 'Admin\UserController@delete',
        'middleware' => 'AdminPanelGuard'
    ],
    '/admin/users/message' => [
        'method' => 'post',
        'target' => 'Admin\UserController@message',
    ],
);
