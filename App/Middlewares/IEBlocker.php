<?php

namespace App\Middlewares;

use App\Core\Request;
use App\Middlewares\Contract\BaseMiddleware;

class IEBlocker extends BaseMiddleware
{

    public function handle(Request $request)
    {
        $agenKey = 'Trident/';
        if (stripos($request->agent, $agenKey) !== false) {
            echo "Sorry IE was Blocked! hahaha.....";
            die();
        }
    }
}
