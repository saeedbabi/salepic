<?php

namespace App\Utilities;

use App\Models\Option as OptionModel;

class Option
{
    public static function get($key)
    {
        $model = new OptionModel();
        return $model->get('value', ['key' => $key]) ?? '';
    }
}
