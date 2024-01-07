<?php

namespace App\Middlewares;

use App\Services\Auth;
use Closure;
use Core\Request\Request;
use Core\Response\Response;

class IsAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::isAuth()) {
            app()->make(Response::class)->setStatusCode(401);
            return view("/login", ["msg" => "Login to start writing your tale!"])->withLayout("layouts.DashboardLayout");
        }

        return $next($request);
    }
}
