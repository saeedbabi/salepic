<?php

namespace App\Services\Validation\Contract;

interface ValidationProvider
{
    public function validator($params, $pattern);
    public function sanitizeData($inputs);
}
