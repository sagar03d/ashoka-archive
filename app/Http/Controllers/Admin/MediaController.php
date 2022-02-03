<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Media;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $images = Media::get();
        return view('admin.media.index', compact('images'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function destroy($id)
    {
        $media = Media::find($id);
        $media->delete();
        return response()->json(['success' => true, 'message' => 'File Deleted']);
    }

    public function edit(Page $page)
    {
        return view('admin.pages.create', compact('page'));
    }

    public function store()
    {
        $validatedData = request()->validate([
            'file' => 'required'
        ]);
        
        $media = new \App\Models\Media;
        if(request()->hasFile('file'))
        {
            $image = time().'.'.request()->file->extension();
            $media->path = 'media/'.$image;
            request()->file->move(public_path('media'), $image);
        }
        
        $media->save();

        return response()->json(['success' => true, 'message' => 'New File Uploaded.']);
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
}
