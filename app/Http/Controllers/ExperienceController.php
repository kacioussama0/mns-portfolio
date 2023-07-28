<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = Experience::all();
        return view('admin.experience.index',compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.experience.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255|min:10',
            'description' => 'required',
            'society' => 'required',
            'from' => 'required',
            'to' => 'required',
        ]);

        $created = Experience::create($validatedData);

        if($created) {
            return redirect()->route('experience.index')->with(['success' => 'Experience created successfully']);
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Experience $experience)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experience)
    {
        return view('admin.experience.edit',compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Experience $experience)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255|min:10',
            'description' => 'required',
            'society' => 'required',
            'from' => 'required',
            'to' => 'required',
        ]);

        $updated = $experience->update($validatedData);

        if($updated) {
            return redirect()->route('experience.index')->with(['success' => 'Experience updated successfully']);
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience)
    {
        if($experience->delete()){
            return redirect()->route('experience.index')->with(['success' => 'Experience deleted successfully']);
        }
        return abort(500);
    }
}
