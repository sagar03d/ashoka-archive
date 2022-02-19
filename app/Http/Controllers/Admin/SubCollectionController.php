<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\Community;
use Illuminate\Support\Str;

class SubCollectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($communityid, $id)
    {
        $community = Community::find($communityid);
        $subcollections = Collection::where('collection_id', $id)->get();
        $collection = Collection::find($id);
        return view('admin.subcollections.index', compact('community','subcollections','collection'));
    }

    public function create($communityid, $id)
    {
        $collection = Collection::find($id);
        $community = Community::find($communityid);
        return view('admin.subcollections.create', compact('collection','community'));
    }

    public function destroy($collectionid, $id)
    {
        $collection = Collection::find($id);
        $collection->delete();
        
        //Delete submenus
        $subcollections = Collection::where('collection_id', $id)->delete();
        
        return response()->json(['success' => true, 'message' => 'Collection Deleted']);
    }

    public function edit($collectionid, $subcollectionid)
    {
        $collection = Collection::find($collectionid);
        $subcollection = Collection::where('id', $subcollectionid)->first();
        return view('admin.subcollections.create', compact('collection','subcollection'));
    }

    public function store($communityid, $collectionid)
    {
        $validatedData = request()->validate([
            'name' => 'required'
        ]);
        
        $subcollection = new Collection;
        $subcollection->name = request()->name;
        $subcollection->collection_id = $collectionid;
        $subcollection->community_id = $communityid;
        $subcollection->save();

        return response()->json(['success' => true, 'message' => 'New Sub Collection Created.']);
    }

    public function update($collectionid, $id)
    {
        $validatedData = request()->validate([
            'name' => 'required'
        ]);
        
        $collection = Collection::find($id);
        $collection->name = request()->name;
        $collection->update();

        return response()->json(['success' => true, 'message' => 'Collection Updated.']);
    }
}
