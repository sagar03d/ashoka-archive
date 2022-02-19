<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\Community;
use Illuminate\Support\Str;

class CollectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($communityid)
    {
        $community = Community::find($communityid);
        $collections = Collection::with('collection')->where('collection_id', null)->where('community_id', $communityid)->get();
        return view('admin.collections.index', compact('collections','community'));
    }

    public function create($communityid)
    {
        $community = Community::find($communityid);
        return view('admin.collections.create', compact('community'));
    }

    public function destroy($id)
    {
        $collection = Collection::find($id);
        $collection->delete();

        return response()->json(['success' => true, 'message' => 'Collection Deleted']);
    }

    public function edit($communityid, $id)
    {
        $collection = Collection::find($id);
        return view('admin.collections.create', compact('collection'));
    }

    public function store($communityid)
    {
        $validatedData = request()->validate([
            'name' => 'required'
        ]);
        
        $collection = new Collection;
        $collection->name = request()->name;
        $collection->community_id = $communityid;
        $collection->save();

        return response()->json(['success' => true, 'message' => 'New Community Created.']);
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
