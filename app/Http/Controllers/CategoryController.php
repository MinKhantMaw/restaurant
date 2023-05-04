<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Yajra\Datatables\Datatables;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\categoryUpdateRequest;

class CategoryController extends Controller
{
    public function index()
    {
        // $categories = Category::get();
        // return $categories;
        return view('category.index');
    }

    public function ssd()
    {
        $category = Category::query();
        return Datatables::of($category)
            ->addColumn('action', function ($each) {

                $edit_icon = '<a href=" ' . route('category.edit', $each->id) . '" class="text-warning mr-2"><i class="fas fa-edit"></i></a>';

                $delete_icon = '<a href=" #" class="text-danger delete-btn" data-id="' . $each->id . '"><i class="fas fa-trash-alt"></i></a>';

                return '<div class="action-icon">' . $edit_icon . $delete_icon . '</div>';
            })
            ->rawColumns(['action'])
            ->make(true);
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

        return redirect()->route('category.index')->with(['create' => 'Category Created Successfully']);
    }

    public function show()
    {
        # code...
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
        return redirect()->route('category.index')->with(['update' => 'Category Updated Successfully']);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return 'success';
    }
}
