<?php

namespace App\Middlewares;

use App\Core\Request;
use App\Middlewares\Contract\BaseMiddleware;
use App\Services\Auth\Auth;
use App\Services\View\View;

class AdminPanelGuard extends BaseMiddleware
{

    public function handle(Request $request)
    {
        if (!Auth::isAdminUser()) {
            View::load('errors.403');
            die();
        }
    }
}
