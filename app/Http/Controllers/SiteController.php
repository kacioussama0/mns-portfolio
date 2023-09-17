<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Post;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home() {
        $educations = Education::orderBy('education_year')->get();
        $experiences = Experience::orderBy('from')->get();
        $services = Service::orderBy('title')->get();
        $projectCategories = Category::where('type','projects')->latest()->get();
        $projects = Project::latest()->get();
        $posts = Post::latest()->get()->take(3);
        return view('home',compact('educations','experiences','services','projectCategories','projects','posts'));
    }

    public function blog($slug) {
        $post = Post::where('slug',$slug)->first();
        $latestPosts = Post::latest()->get()->take(5);
        $categories = Category::where('type','posts')->latest()->get();
        return view('blog',compact('post','latestPosts','categories'));
    }
}
