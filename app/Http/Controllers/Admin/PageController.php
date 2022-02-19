<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pages = Page::get();
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.create', compact('page'));
    }

    public function store()
    {
        $validatedData = request()->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
            'content' => 'required',
        ]);
        
        $page = new Page;
        $page->title = request()->title;
        $page->slug = request()->slug;
        $page->content = request()->content;
        $page->save();

        return response()->json(['success' => true, 'message' => 'New Page Created.']);
    }

    public function update($id)
    {
        $validatedData = request()->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
            'content' => 'required',
        ]);
        
        $page = Page::find($id);
        $page->title = request()->title;
        $page->slug = request()->slug;
        $page->content = request()->content;
        $page->update();

        return response()->json(['success' => true, 'message' => 'New Page updated.']);
    }

    public function destroy($id)
    {
        $page = Page::where('id', $id)->delete();
        return response()->json(['success' => true, 'message' => 'Page Deleted']);
    }
}
