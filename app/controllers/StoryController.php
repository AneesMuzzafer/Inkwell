<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Like;
use App\Models\Story;
use App\Models\User;
use App\Services\Auth;
use App\Storage\FileStorage;
use Core\Request\Request;

class StoryController
{

    public function index(Request $request)
    {
        $data = $request->data();

        [$rawStories, $params] = Story::fetchFromParams($data);

        $stories = $this->generateStories($rawStories);

        return view("Home", [
            "stories" => $stories,
            "selectedCategory" => $params["category"],
            "sortBy" => $params["sortBy"],
            "page" => $params["page"],
            "search" => $params["search"]
        ])->withLayout("layouts.DashboardLayout");
    }

    public function show(Story $story)
    {
        $totalLikes = count(Like::allWhere(["story_id" => $story->id]));

        $isLiked = false;
        if (Auth::isAuth()) {
            $isLiked = Like::where(["user_id" => Auth::user()->id, "story_id" => $story->id]) != null;
        }

        $relatedStories = array_slice($this->generateStories(Story::allWhere(["id" => ["!=", $story->id]])), 0, 3);

        return view("Story", [
            "story" => $story,
            "user" => $story->user(),
            "totalLikes" => $totalLikes,
            "isLiked" => $isLiked,
            "relatedStories" => $relatedStories,
        ])->withLayout("layouts.DashboardLayout");
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

        $file = $request->files()["storyImage"];

        if (($file["error"] == 0)) {
            $fileStorage = new FileStorage($request->files()["storyImage"], "post", $story->id);
            $accessPath = $fileStorage->save();
            $story->image = $accessPath;
            $story->save();
        }

        return redirect("/story/$story->id");
    }

    public function edit(Story $story)
    {
        if (Auth::user()->id != $story->user_id) {
            redirect("/");
        }
        return view("Compose", ["story" => $story])->withLayout("layouts.DashboardLayout");
    }

    public function update(Request $request, string $id)
    {
        $data = $request->data();

        $story = Story::update($id, [
            "title" => $data["title"],
            "content" => $data["content"],
            "category_id" => $data["category"],
        ]);

        $file = $request->files()["storyImage"];

        if (($file["error"] == 0)) {
            $fileStorage = new FileStorage($request->files()["storyImage"], "post", $story->id);
            $accessPath = $fileStorage->save();
            $story->image = $accessPath;
            $story->save();
        }

        return redirect("/story/$story->id");
    }

    public function delete(Story $story)
    {
        if (Auth::user()->id == $story->user_id) {
            Story::delete($story->id);
        }
        return redirect("/");
    }

    public function like(Request $request)
    {
        $user = Auth::user();
        $story_id = $request->data()["story_id"];
        $liked = Like::where(["user_id" => $user->id, "story_id" => $story_id]);

        if ($liked) {
            Like::delete($liked->id);
            $isLiked = false;
        } else {
            Like::create(
                [
                    "story_id" => $story_id,
                    "user_id" => $user->id
                ]
            );
            $isLiked = true;
        }

        return [
            "status" => "success",
            "isLiked" => $isLiked,
        ];
    }

    public function generateStories($stories)
    {
        return array_map(function ($story) {
            $story["user"] = (object) User::find($story["user_id"])->data();
            $story["category"] = (object) Category::find($story["category_id"])->data();
            $story["readTime"] = Story::readTime($story["content"]);
            $story["likes"] = count(Like::allWhere(["story_id" => $story["id"]]));

            return (object) $story;
        }, $stories);
    }
}
