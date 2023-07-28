<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');

    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:categories',
            'slug' => 'required',
            'type' => 'required',
        ]);

        $validatedData['is_published'] = $request->is_published ? 1 : 0;

        $created = Category::create($validatedData);

        if($created) {
            return redirect()->route('categories.index')->with(['success' => 'Category created successfully']);
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:categories,name,' . $category->id,
            'slug' => 'required',
            'type' => 'required',
        ]);

        $validatedData['is_published'] = $request->is_published ? 1 : 0;

        $updated = $category->update($validatedData);

        if($updated) {
            return redirect()->route('categories.index')->with(['success' => 'Category updated successfully']);
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if($category->delete()) {
            return redirect()->route('categories.index')->with(['success' => 'Category deleted successfully']);
        }
        return abort(500);
    }
}
