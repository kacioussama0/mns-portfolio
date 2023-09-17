<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('type','posts')->get();
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'slug'=> 'required',
            'category_id'=> 'required',
            'thumbnail'=> 'required',
        ]);

        $image = $request->file('thumbnail')->store('posts','public');

        $created = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'thumbnail' => $image,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'is_published' => $request->is_published ? 1 : 0
        ]);

        if($created) {
            return redirect()->route('posts.index')->with(['success' => 'Post created successfully']);
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::where('type','posts')->get();
        return view('admin.posts.edit',compact('categories','post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {


        $data = $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'slug'=> 'required',
            'category_id'=> 'required',
        ]);

        $image = '';

        if($request->hasFile('thumbnail')) {
            Storage::delete('public/' . $post ->thumbnail);
            $image = $request->file('thumbnail')->store('posts','public');
        }

        $created = $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'thumbnail' => $image ? $image : $post -> thumbnail,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'is_published' => $request->is_published ? 1 : 0
        ]);

        if($created) {
            return redirect()->route('posts.index')->with(['success' => 'Post updated successfully']);
        }

         abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->delete()){
            Storage::delete('public/' . $post ->thumbnail);
            return redirect()->route('posts.index')->with(['success' => 'Post deleted successfully']);
        }
        abort(500);
    }
}
