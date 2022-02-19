<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Collection;
use App\Models\Community;
use Collator;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($collectionid)
    {
        $collection = Collection::find($collectionid);
        $items = Item::where('collection_id', $collectionid)->get();
        return view('admin.items.index', compact('collection','items'));
    }

    public function create($collectionid)
    {
        $collection = Collection::find($collectionid);
        return view('admin.items.create', compact('collection'));
    }

    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();

        return response()->json(['success' => true, 'message' => 'Item Deleted']);
    }

    public function edit($collectionid, $id)
    {
        $item = Item::find($id);
        $collection = Collection::find($collectionid);
        return view('admin.items.create', compact('item', 'collection'));
    }

    public function store($collectionid)
    {
        $validatedData = request()->validate([
            'name' => 'required'
        ]);
        
        $item = new Item;
        $item->name = request()->name;
        $item->collection_id = $collectionid;
        $item->save();

        return response()->json(['success' => true, 'message' => 'New Item Created.']);
    }

    public function update($collection, $id)
    {
        $validatedData = request()->validate([
            'name' => 'required'
        ]);
        
        $item = Item::find($id);
        $item->name = request()->name;
        $item->update();

        return response()->json(['success' => true, 'message' => 'New Item Updated.']);
    }
}
