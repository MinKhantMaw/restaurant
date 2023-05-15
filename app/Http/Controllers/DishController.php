<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Category;
use Yajra\Datatables\Datatables;
use App\Http\Requests\DishStoreRequest;
use App\Http\Requests\DishUpdateRequest;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    public function index()
    {
        $dishes = Dish::with(['category','orders'])->get();
        return view('dishes.index', compact('dishes'));
    }

    public function ssd()
    {
        // $dishes = Dish::query();
        // return Datatables::of($dishes)->make(true);
    }

    public function create()
    {
        $categories = Category::get();
        return view('dishes.create', compact('categories'));
    }

    public function store(DishStoreRequest $request)
    {
        $img_name = "";
        if ($request->hasFile('image')) {
            $image_file = $request->file('image');
            $img_name = time() . '-' . uniqid() . '-' . $image_file->getClientOriginalName();


            Storage::disk('public')->put(
                'dishes/' . $img_name,
                file_get_contents($image_file)
            );
        }
        Dish::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $img_name,
            'url' => asset('/storage/dishes/' . $img_name),
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('dish.index')->with(['create' => 'Dished Created Successfully']);
    }

    public function edit($id)
    {
        $dish = Dish::find($id);
        $categories = Category::get();
        return view('dishes.edit', compact('dish', 'categories'));
    }

    public function update(DishUpdateRequest $request, $id)
    {
        $dish = Dish::find($id);
        $img_name = "";
        if ($request->hasFile('image')) {
            $image_file = $request->file('image');
            $img_name = time() . '-' . uniqid() . '-' . $image_file->getClientOriginalName();

            Storage::disk('public')->put(
                'dishes/' . $img_name,
                file_get_contents($image_file)
            );
            Storage::disk('public')->delete("dishes/$dish->image");
        }

        $dish->name = $request->name;
        $dish->price = $request->price;
        $dish->image = $request->image ?  $img_name : $dish->image;
        $dish->category_id = $request->category_id;
        $dish->save();
        return redirect()->route('dish.index')->with(['update' => 'Dish Updated Successfully']);
    }

    public function destroy($id)
    {
        $dish = Dish::find($id);
        Storage::disk('public')->delete("dishes/$dish->image");
        $dish->delete();
        return redirect()->route('dish.index');
    }
}
