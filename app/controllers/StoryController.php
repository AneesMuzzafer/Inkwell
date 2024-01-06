<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Story;
use App\Models\User;
use App\Services\Auth;
use Core\Request\Request;

class StoryController
{

    public function index()
    {
        $stories = $this->generateStories(Story::all());

        return view("Home", ["stories" => $stories])->withLayout("layouts.DashboardLayout");
    }

    public function show(Story $story)
    {
        $relatedStories = array_slice($this->generateStories(Story::all()), 0, 3);

        return view("Story", ["story" => $story, "relatedStories" => $relatedStories])->withLayout("layouts.DashboardLayout");
    }

    public function compose()
    {
        return view("Compose")->withLayout("layouts.DashboardLayout");
    }

    public function create(Request $request)
    {
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

    public function generateStories($stories)
    {
        return array_map(function ($story) {
            $story["user"] = (object) User::find($story["user_id"])->data();
            $story["category"] = (object) Category::find($story["category_id"])->data();
            $story["readTime"] = Story::readTime($story["content"]);
            $story["image"] = $story["image"] ?? Story::DEFAULT_IMAGE;
            $story["user"]->image = $story["user"]->image ?? User::DEFAULT_IMAGE;

            return (object) $story;
        }, $stories);
    }
}
