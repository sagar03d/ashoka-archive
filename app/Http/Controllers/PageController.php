<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function index($slug)
    {
        $page = Page::where('slug', $slug)->first();
        if ( is_null($page) )
            return abort('404');

        return view('dynamicpage', compact('page'));
    }
}
