<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'thumbnail'=> 'required',
        ]);

        $image = $request->file('thumbnail')->store('services','public');

        $created = Service::create([
           'title' => $request->title,
           'description' => $request->description,
           'thumbnail' => $image,
        ]);

        if($created) {
            return redirect()->route('services.index')->with(['success' => 'Service created successfully']);
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'thumbnail'=> 'required',
        ]);

        $image = '';

        if($request->hasFile('thumbnail')) {
            Storage::delete('public/' . $service ->thumbnail);
            $image = $request->file('thumbnail')->store('services','public');
        }

        $updated = $service->update([
            'title' => $request->title,
            'description' => $request->description,
            'thumbnail' => $image ? $image : $service -> thumbnail,
        ]);

        if($updated) {
            return redirect()->route('services.index')->with(['success' => 'Service updated successfully']);
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        if($service->delete()){
            Storage::delete('public/' . $service ->thumbnail);
            return redirect()->route('services.index')->with(['success' => 'Service deleted successfully']);
        }
        return abort(500);
    }
}
