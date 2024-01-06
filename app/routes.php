<?php

use App\Controllers\AuthController;
use App\Controllers\StoryController;
use App\Controllers\UserController;
use App\Middlewares\HasSession;
use App\Middlewares\IsAuth;
use Core\Facade\Route;


Route::get("/register", [AuthController::class, "showRegister"]);

Route::get("/login", [AuthController::class, "showLogin"]);

Route::get("/logout", [AuthController::class, "logout"]);

Route::post("/register", [AuthController::class, "register"]);

Route::post("/login", [AuthController::class, "login"]);

Route::group(["middleware" => [HasSession::class]], function () {

    Route::get("/", [StoryController::class, "index"]);

    Route::get("/story", [StoryController::class, "index"]);

    Route::get("/story/{story}", [StoryController::class, "show"]);

    Route::group(["middleware" => [IsAuth::class]], function () {

        Route::get("/compose", [StoryController::class, "compose"]);

        Route::post("/compose", [StoryController::class, "create"]);

        Route::get("/profile", [UserController::class, "editProfile"]);

        Route::put("/profile", [UserController::class, "updateProfile"]);
    });
});
