<?php

namespace App\Services\Basket\Providers;

use App\Services\Basket\Contract\BasketContract;

class SessionProvider implements BasketContract
{
    public static $instance;

    public static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {
        if (!$this->count()) {
            $_SESSION['cart'] = array();
        }
    }

    public function add($item)
    {

        $count = $_SESSION['cart'][$item->id]->count ?? 0;
        if (!$this->itemExist($item->id)) {
            $_SESSION['cart'][$item->id] = $item;
        }
        $_SESSION['cart'][$item->id]->count = ++$count;
    }


    public function remove($item_id)
    {
        if ($this->itemExist($item_id)) {
            unset($_SESSION['cart'][$item_id]);
        }
    }


    public function total()
    {
        $total_price = 0;
        foreach ($this->items() as $item) {
            $total_price += $item->price * $item->count;
        }
        return $total_price;
    }


    public function reset()
    {
        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
    }

    public static function count()
    {
        return count($_SESSION['cart']) ?? 0;
    }


    public function items(): array
    {
        return $_SESSION['cart'] ?? array();
    }


    public function itemExist($item_id)
    {
        return isset($_SESSION['cart'][$item_id]);
    }
}
