<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('type','projects')->get();
        return view('admin.projects.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=> 'required',
            'category_id'=> 'required',
            'thumbnail'=> 'required',
            'description' => 'required'
        ]);

        $image = $request->file('thumbnail')->store('projects','public');

        $created = Project::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'thumbnail' => $image,
        ]);

        if($created) {
            return redirect()->route('projects.index')->with(['success' => 'Projects created successfully']);
        }

        abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $categories = Category::where('type','projects')->get();
        return view('admin.projects.edit',compact('project','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'name'=> 'required',
            'category_id'=> 'required',
            'description'=> 'required',
        ]);

        $image = '';

        if($request->hasFile('thumbnail')) {
            Storage::delete('public/' . $project ->thumbnail);
            $image = $request->file('thumbnail')->store('projects','public');
        }


        $updated = $project->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'thumbnail' => $image ? $image : $project -> thumbnail,
        ]);

        if($updated) {
            return redirect()->route('projects.index')->with(['success' => 'Projects updated successfully']);
        }

        abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if($project->delete()) {
            Storage::delete('public/' . $project ->thumbnail);
            return redirect()->route('projects.index')->with(['success' => 'Projects deleted successfully']);
        }

        abort(500);

    }
}
