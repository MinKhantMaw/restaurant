<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\categoryUpdateRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        // return $categories;
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CategoryStoreRequest $request)
    {
        $category = Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    public function update(categoryUpdateRequest $request, $id)
    {
        // return $request->all();
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category.index');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index');
    }
}
