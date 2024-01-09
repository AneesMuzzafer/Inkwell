<?php

namespace App\Controllers;

use App\Models\Category;
use Core\Request\Request;

class CategoryController
{

    public function edit()
    {
        $categories = Category::all();
        return view("Category", ["categories" => $categories])->withLayout("layouts.DashboardLayout");
    }

    public function store(Request $request)
    {
        $name = $request->data()["name"];
        $category = Category::where(["name" => $name]);

        if ($category) {
            return view("Category", ["categories" =>  Category::all(), "msg" => "Category already exists!"])->withLayout("layouts.DashboardLayout");
        }

        Category::create($request->data());

        redirect("/category");
    }
}
