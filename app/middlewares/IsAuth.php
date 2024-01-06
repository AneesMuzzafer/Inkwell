<?php

namespace App\Middlewares;

use App\Services\Auth;
use Closure;
use Core\Request\Request;

class IsAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::isAuth()) {
            return view("/login", ["msg" => "Login to start writing your tale!"])->withLayout("layouts.DashboardLayout");
        }

        return $next($request);
    }
}
