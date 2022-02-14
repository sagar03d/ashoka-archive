<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Str;
use PhpParser\Comment\Doc;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $documents = Document::orderBy('id','DESC')->paginate(20);
        $nonmetadatadocs = Document::where('metadata', null)->get();
        
        $nonmetadatadocs = collect($nonmetadatadocs)->map(function($q){
            $newobj = new \stdClass;
            $newobj->id = $q->id;
            $newobj->path = asset($q->path);
            return $newobj;
        });
        
        return view('admin.documents.index', compact('documents','nonmetadatadocs'));
    }

    public function create()
    {
        return view('admin.documents.create');
    }

    public function upload()
    {
        if(request()->hasFile('filename'))
        {
            $file = time().'.'.request()->filename->extension();
            
            request()->filename->move(storage_path('app/public/assets'), $file);
            $path = 'storage/assets/'.$file;

            return response()->json(['success' => true, 'path' => asset($path), 'actualpath' => $path]);
        }
        return false;
    }

    public function destroy($id)
    {
        
    }

    public function edit(Document $page)
    {
        return view('admin.pages.create', compact('page'));
    }

    public function store()
    {
        $validatedData = request()->validate([
            'name' => 'required',
            'file' => 'required'
        ]);
        
        $path = request()->path;

        $document = new \App\Models\Document;
        $document->name = request()->name;
        if(!isset($path) && request()->hasFile('file'))
        {
            $file = time().'.'.request()->file->extension();
            $document->path = 'storage/documents/'.$file;
            request()->file->move(storage_path('app/public/documents'), $file);
        }
        
        if(isset($path))
        {
            $document->path = $path;
        }

        $document->metadata = request()->metadata;
        $document->save();

        return response()->json(['success' => true, 'message' => 'New File Uploaded.']);
    }

    public function updateMetadata()
    {
        $id = request()->document_id;
        $metadata = request()->metadata;
        
        $document = Document::find($id);
        $document->metadata = $metadata;
        $document->update();
        return response()->json(['success' => true, 'message' => 'Done']);
    }

    public function update($id)
    {
        $validatedData = request()->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
            'content' => 'required',
        ]);
        
        $page = Document::find($id);
        $page->title = request()->title;
        $page->slug = request()->slug;
        $page->content = request()->content;
        $page->update();

        return response()->json(['success' => true, 'message' => 'New Page updated.']);
    }
}
