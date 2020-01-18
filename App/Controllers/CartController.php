<?php

namespace App\Controllers;


use App\Services\View\View;

class CartController
{

    public function __construct()
    { }

    public function list()
    {
        $data = array();
        View::load('cart.list', $data, 'baseLayout');
    }
}
