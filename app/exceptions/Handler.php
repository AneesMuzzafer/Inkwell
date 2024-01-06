<?php

namespace App\Exceptions;

use Core\Exception\ExceptionHandler;
use Core\Exception\ModelNotFoundException;
use Exception;

class Handler extends ExceptionHandler
{
    public function handle($e)
    {
        if($e instanceof ModelNotFoundException) {
            return view("404")->withLayout("layouts.DashboardLayout");
        }
    }
}
