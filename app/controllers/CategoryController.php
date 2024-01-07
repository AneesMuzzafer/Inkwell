<?php

namespace App\Controllers;

use App\Models\Category;
use Core\Request\Request;

class CategoryController {

    public function edit()
    {
        $categories = Category::all();
        return view("Category", ["categories" => $categories])->withLayout("layouts.DashboardLayout");
    }

    public function store(Request $request)
    {
        Category::create($request->data());

        $categories = Category::all();
        return view("Category", ["categories" => $categories])->withLayout("layouts.DashboardLayout");
    }
}
