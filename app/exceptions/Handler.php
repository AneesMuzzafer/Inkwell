<?php

namespace App\Exceptions;

use Core\Exception\ExceptionHandler;
use Core\Exception\ModelNotFoundException;
use Core\Exception\RouteNotFoundException;
use Exception;

class Handler extends ExceptionHandler
{
    public function handle($e)
    {
        if($e instanceof ModelNotFoundException || $e instanceof RouteNotFoundException) {
            return view("404")->withLayout("layouts.DashboardLayout");
        }
    }
}
