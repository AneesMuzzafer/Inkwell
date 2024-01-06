<?php

namespace App\Controllers;

use App\Models\Story;
use App\Services\Auth;
use Core\Request\Request;

class StoryController
{

    public function index()
    {
        return view("Home")->withLayout("layouts.DashboardLayout");
    }

    public function show(Story $story)
    {
        return view("Story", ["story" => $story])->withLayout("layouts.DashboardLayout");
    }

    public function compose()
    {
        return view("Compose")->withLayout("layouts.DashboardLayout");
    }

    public function create(Request $request) {
        $data = $request->data();
        $user = Auth::user();

        $story = Story::create([
            "title" => $data["title"],
            "content" => $data["content"],
            "category_id" => $data["category"],
            "user_id" => $user->id,
            "likes" => 0,
        ]);


        redirect("/story/$story->id");
    }
}
