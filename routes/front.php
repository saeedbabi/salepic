<?php
return array(
    '/' => [
        'method' => 'get',
        'target' => 'HomeController@index',
    ],
    '/ajax-search' => [
        'method' => 'post',
        'target' => 'HomeController@ajaxSearch',
    ],
    '/contact' => [
        'method' => 'get',
        'target' => 'HomeController@contact',
    ],
    '/about' => [
        'method' => 'get',
        'target' => 'HomeController@about',
    ],
    '/forgetPass' => [
        'method' => 'get',
        'target' => 'HomeController@forgetPass',
    ],
    '/resetPass' => [
        'method' => 'post',
        'target' => 'UserController@forgetPassword',
    ],
    // Image Routes
    '/image/{id}' => [
        'method' => 'get',
        'target' => 'ImageController@image',
    ],
    '/search' => [
        'method' => 'get',
        'target' => 'ImageController@search',
    ],
    '/like/add' => [
        'method' => 'post',
        'target' => 'LikeController@add',
    ],
    '/view/add' => [
        'method' => 'post',
        'target' => 'ViewController@add',
    ],
    // Cart Routes
    '/cart' => [
        'method' => 'get',
        'target' => 'CartController@list',
    ],
);
