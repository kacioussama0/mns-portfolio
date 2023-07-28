<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Service;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home() {
        $educations = Education::orderBy('education_year')->get();
        $experiences = Experience::orderBy('from')->get();
        $services = Service::orderBy('title')->get();
        return view('home',compact('educations','experiences','services'));
    }
}
