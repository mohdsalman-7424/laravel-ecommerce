<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category as ModelsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Category extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $categories = ModelsCategory::all();
        return view('admin.category.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'category_name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',

        ]);
        if($validate->fails()){
            return response()->json([
                'status' => false,
                'errors' => $validate->errors()
            ]);
        }
        $category = new ModelsCategory();
        $category->name = $request->category_name;
        $category->slug = $request->slug;
        $category->status = $request->status;
        $category->is_menu = $request->show_in_menu;
        $category->save();
        session()->flash('success', 'Category created successfully');
        return response()->json([
            'status' => 1,
            'message' => 'Category created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
