<?php

namespace App\Controllers;

use App\Models\User;
use App\Services\Auth;
use Core\Database\Database;
use Core\Request\Request;

class AuthController
{

    public function showRegister()
    {
        return view("Register")->withLayout("layouts.DashboardLayout");
    }

    public function showLogin()
    {
        return view("Login")->withLayout("layouts.DashboardLayout");
    }

    public function register(Request $request)
    {

        $data = $request->data();
        if ($data["password"] != $data["confirm_password"]) {
            return view("Register", ["password" => "Passwords do not match!"])->withLayout("layouts.DashboardLayout");
        }

        $hashedPassword = password_hash($data["password"], PASSWORD_BCRYPT);

        $user = User::create([
            "username" => $data["username"],
            "email" => $data["email"],
            "password" => $hashedPassword,
        ]);

        Auth::login($user);

        redirect("/");
    }

    public function login(Request $request, Database $database)
    {
        $data = $request->data();

        $email = $data["email"];
        $user = User::where(["email" => $email]);

        if (is_null($user)) {
            return view("Login", ["msg" => "Invalid credentials!"])->withLayout("layouts.DashboardLayout");
        }

        $password = $data["password"];
        if (!password_verify($password, $user->password)) {
            return view("Login", ["msg" => "Invalid credentials!"])->withLayout("layouts.DashboardLayout");
        }

        Auth::login($user);

        redirect("/");
    }

    public function logout()
    {
        Auth::logout();

        redirect("/");
    }
}
