<?php

namespace App\Services\Validation;

use App\Contracts\Facade;
use App\Services\Validation\Provider\GumpProvider;

class Validation extends Facade
{
    protected static $provider;

    public static function setProvider()
    {
        self::$provider = GumpProvider::instance();
    }
}
