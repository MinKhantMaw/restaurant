<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\DishStoreRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DishController extends Controller
{
    public function index()
    {
        return view('dishes.index');
    }

    public function ssd()
    {
        $dishes = Dish::query();
        return Datatables::of($dishes)->make(true);
    }

    public function create()
    {
        $categories = Category::get();
        return view('dishes.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required',
        ]);
        // dd($request);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $img_name = "";
        if ($request->hasFile('image')) {
            $image_file = $request->file('image');
            $img_name = time() . '-' . uniqid() . '-' . $image_file->getClientOriginalName();


            Storage::disk('public')->put(
                'dishes/' . $img_name,
                file_get_contents($image_file)
            );
        }
// dd($img_name);
        Dish::create([
            'name' => $request->name,
            'image' => $img_name,
            'url' => asset('/storage/dishes/' . $img_name),
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('dish.index')->with(['created' => 'Dished Created Successfully']);
    }
}
