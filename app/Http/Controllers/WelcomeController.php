<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Slider;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', true)->get();
        $collections = Collection::where('collection_id', null)->orderBy('id','DESC')->take(8)->get();
        return view('welcome', compact('sliders','collections'));
    }

    public function about()
    {
        return view('about');
    }
}
