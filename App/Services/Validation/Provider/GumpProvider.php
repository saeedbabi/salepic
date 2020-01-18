<?php

namespace App\Services\Validation\Provider;

use App\Services\Validation\Contract\ValidationProvider;
use GUMP;

class GumpProvider extends GUMP implements ValidationProvider
{
    public static $instance = null;

    public static function instance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }
    public function validator($params, $pattern)
    {
        return $this->is_valid($params, $pattern);
    }
    public function sanitizeData($inputs)
    {
        return $this->sanitize($inputs);
    }
}
