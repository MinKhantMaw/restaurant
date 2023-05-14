<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TableController extends Controller
{
    public function index()
    {
        $tables = Table::get();
        return view('tables.index', compact('tables'));
    }

    public function create()
    {
        return view('tables.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        Table::create([
            'name' => $request->name
        ]);
        return redirect()->route('tables.index')->with(['create' => 'Table Create Successfully']);
    }

    public function show()
    {
        # code...
    }

    public function edit($id)
    {
        $table = Table::find($id);
        return view('tables.update', compact('table'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $table = Table::findOrFail($id);
            $table->name = $request->name;
            $table->save();

            return redirect()->route('tables.index')->with(['update' => 'Table Updated Successfully']);
        } catch (ModelNotFoundException $exception) {
            // Handle the case where the table with the given ID is not found
            return redirect()->route('tables.index')->with(['error' => 'Table not found']);
        } catch (\Exception $exception) {
            // Handle any other exceptions that might occur
            return redirect()->route('tables.index')->with(['error' => 'An error occurred']);
        }
    }

    public function destroy($id)
    {
        $table =  Table::find($id);
        $table->delete();
        return redirect()->route('tables.index');
    }
}
