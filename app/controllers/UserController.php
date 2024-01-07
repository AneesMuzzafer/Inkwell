<?php

namespace App\Controllers;

use App\Services\Auth;
use App\Storage\FileStorage;
use Core\Request\Request;

class UserController
{

    public function index()
    {
    }

    public function editProfile()
    {
        return view("Profile", ["data" => Auth::user()->data()])->withLayout("layouts.DashboardLayout");
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $data = $request->data();

        if ($data["password"] != $data["confirm_password"]) {
            return view("Profile", ["data" => $user->data(), "password" => "Passwords do not match!"])->withLayout("layouts.DashboardLayout");
        }

        $user->username = $data["username"];
        $user->bio = $data["bio"];

        if($data["password"]) {
            $user->password = password_hash($data["password"], PASSWORD_BCRYPT);
        }

        $file = $request->files()["profilePicture"];

        if(($file["error"] == 0)) {
            $fileStorage = new FileStorage($request->files()["profilePicture"], "user", $user->id);
            $accessPath = $fileStorage->save();
            $user->image = $accessPath;
        }

        $user->save();

        return view("Profile", ["data" => $user->data(), "msg" => "Profile updated successfully"])->withLayout("layouts.DashboardLayout");
    }
}
