<?php
return  array(

    // User Routes
    '/user/register' => [
        'method' => 'post',
        'target' => 'AuthController@register',
    ],
    '/user/login' => [
        'method' => 'post',
        'target' => 'AuthController@login',
    ],
    '/user/islogin' => [
        'method' => 'get',
        'target' => 'AuthController@isLogin',
    ],
    '/user/logout' => [
        'method' => 'get',
        'target' => 'AuthController@logout',
    ],
    '/profile/user' => [
        'method' => 'get',
        'target' => 'UserController@user',
    ],
    '/profile/user/edit' => [
        'method' => 'post',
        'target' => 'UserController@userEdit',
    ],
    '/profile/user/avatar' => [
        'method' => 'post',
        'target' => 'UserController@avatar',
    ],
    '/profile/user/edit-pass' => [
        'method' => 'post',
        'target' => 'UserController@editPassword',
    ],
    '/profile/user/message-to-admin' => [
        'method' => 'post',
        'target' => 'UserController@messageToAdmin',
    ],
    // Photographer Routes
    '/profile/public/{id}(/)' => [
        'method' => 'get|post',
        'target' => 'PhotographerController@public',
    ],
    '/profile/public/ajax-search' => [
        'method' => 'post',
        'target' => 'PhotographerController@ajaxSearch',
    ],
    '/profile/user/upload-image' => [
        'method' => 'post',
        'target' => 'ImageController@upload',
    ],
    '/profile/user/shutter/edit' => [
        'method' => 'post',
        'target' => 'UserController@shutterEdit',
    ],
    '/profile/user/shutter/edit-pass' => [
        'method' => 'post',
        'target' => 'UserController@editPassword',
    ],
    '/profile/user/modalimage' => [
        'method' => 'post',
        'target' => 'UserController@modalimage',
    ],
    '/profile/user/delete' => [
        'method' => 'get',
        'target' => 'UserController@delete',
    ],
);
