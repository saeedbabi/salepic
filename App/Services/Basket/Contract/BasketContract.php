<?php

namespace App\Services\Basket\Contract;

interface BasketContract
{

    public function add($item);
    public function remove($item);
    public function total();  // total price
    public function reset();
    public function items();
    public static function count();
}
