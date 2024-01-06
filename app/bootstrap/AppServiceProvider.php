<?php

namespace App\Bootstrap;

use App\Services\Auth;

class AppServiceProvider
{
    public function register(): void
    {
        app()->singleton(Auth::class, function() {
            return new Auth();
        });
    }

    public function boot(): void
    {
        //
    }
}
