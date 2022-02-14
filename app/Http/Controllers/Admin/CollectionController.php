<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Collection;
use Illuminate\Support\Str;

class CollectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $collections = Collection::with('collection')->where('collection_id', null)->get();
        return view('admin.collections.index', compact('collections'));
    }

    public function create()
    {
        return view('admin.collections.create');
    }

    public function destroy($id)
    {
        $collection = Collection::find($id);
        $collection->delete();

        return response()->json(['success' => true, 'message' => 'Collection Deleted']);
    }

    public function edit($id)
    {
        $collection = Collection::find($id);
        return view('admin.collections.create', compact('collection'));
    }

    public function store()
    {
        $validatedData = request()->validate([
            'name' => 'required'
        ]);
        
        $collection = new Collection;
        $collection->name = request()->name;
        $collection->save();

        return response()->json(['success' => true, 'message' => 'New Collection Created.']);
    }

    public function update($id)
    {
        $validatedData = request()->validate([
            'name' => 'required'
        ]);
        
        $collection = Collection::find($id);
        $collection->name = request()->name;
        $collection->update();

        return response()->json(['success' => true, 'message' => 'New Collection Updated.']);
    }
}
