<?php

namespace App\Controllers;

class UserController
{

    public function index()
    {
    }

    public function editProfile()
    {
        return view("Profile")->withLayout("layouts.DashboardLayout");
    }

    public function updateProfile()
    {
    }
}
