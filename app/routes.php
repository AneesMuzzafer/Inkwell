<?php

use App\Middlewares\Logger;
use Core\Facade\Route;

Route::get("/", function () {
    return view("Home")->withLayout("layouts.DashboardLayout");
});

Route::get("/story/{id}", function ($id) {
    return view("Story", ["id" => $id])->withLayout("layouts.DashboardLayout");
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
