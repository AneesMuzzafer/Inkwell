<?php

use App\Middlewares\Logger;
use App\Models\Story;
use Core\Facade\Route;

Route::get("/", function () {
    return view("Home")->withLayout("layouts.DashboardLayout");
});

Route::get("/story/{story}", function (Story $story) {
    return view("Story", ["story" => $story])->withLayout("layouts.DashboardLayout");
});

Route::get("/register", function () {
    return view("Register")->withLayout("layouts.DashboardLayout");
});

Route::get("/login", function () {
    return view("Login")->withLayout("layouts.DashboardLayout");
});

Route::get("/profile", function () {
    return view("Profile")->withLayout("layouts.DashboardLayout");
});

Route::get("/compose", function () {
    return view("Compose")->withLayout("layouts.DashboardLayout");
});
