<?php

namespace App\Middlewares;

use App\Core\Request;
use App\Middlewares\Contract\BaseMiddleware;

class FirefoxBlocker extends BaseMiddleware
{

    public function handle(Request $request)
    {
        $agenKey = 'Gecko/';
        if (stripos($request->agent, $agenKey) !== false) {
            echo "Sorry Firefox was Blocked! hahaha.....";
            die();
        }
    }
}
