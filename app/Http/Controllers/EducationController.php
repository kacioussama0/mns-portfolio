<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educations = Education::latest()->get();
        return view('admin.education.index',compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.education.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255|min:10',
            'description' => 'required',
            'education_year' => 'required'
        ]);

        $created = Education::create($validatedData);

        if($created) {
            return redirect()->route('education.index')->with(['success' => 'education created successfully']);
        }

        return abort(500);

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Education $education)
    {
        return view('admin.education.edit',compact('education'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Education $education)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255|min:10',
            'description' => 'required',
            'education_year' => 'required'
        ]);

        $updated = $education->update($validatedData);

        if($updated) {
            return redirect()->route('education.index')->with(['success' => 'education updated successfully']);
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        if($education->delete()) {
            return redirect()->route('education.index')->with(['success' => 'education deleted successfully']);
        }
    }
}
