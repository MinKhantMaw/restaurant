<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryStoreRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        // return $categories;
        return view('category.index',compact('categories'));
    }

    public function create()
    {
       return view('category.create');
    }

    public function store(CategoryStoreRequest $request,Category $category)
    {
        $category->name = $request->name;
        return redirect()->route('category.index');
    }

    public function edit(Request $request)
    {
        # code...
    }

    public function update($id, Request $request)
    {
        # code...
    }

    public function delete(Request $request)
    {
        # code...
    }
}
