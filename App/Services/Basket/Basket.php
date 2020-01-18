<?php

namespace App\Services\Basket;

use App\Contracts\Facade;
use App\Services\Basket\Providers\SessionProvider;

class Basket extends Facade
{
    protected static $provider;
    public static function setProvider()
    {
        self::$provider = SessionProvider::instance();           
    }
}
           