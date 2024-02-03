<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Hero;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Service;
use App\Models\TyperTitle;

class HomeController extends Controller
{
    public function index()
    {
        $hero = Hero::first();
        $typerTitles = TyperTitle::all();
        $services = Service::all();
        $about = About::first();
        return view('frontend.home', compact('hero', 'typerTitles', 'services', 'about'));
    }
}
