<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\File;
use App\Models\Collection;
use App\Models\Community;
use Collator;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($itemid)
    {
        $item = Item::find($itemid);
        $files = File::where('item_id', $itemid)->get();
        return view('admin.files.index', compact('item','files'));
    }

    public function create($itemid)
    {
        $item = Item::find($itemid);
        return view('admin.files.create', compact('item'));
    }

    public function destroy($id)
    {
        $file = File::find($id);
        $file->delete();

        return response()->json(['success' => true, 'message' => 'File Deleted']);
    }

    public function edit($collectionid, $id)
    {
        $item = Item::find($id);
        $collection = Collection::find($collectionid);
        return view('admin.files.create', compact('item', 'collection'));
    }

    public function store($itemid)
    {
        $validatedData = request()->validate([
            'files' => 'required'
        ]);
        
        $files = request()->file('files');

        if(request()->hasFile('files'))
        {
            foreach ($files as $file) {
                $file1 = time().'.'.$file->extension();
                
                $file->move(storage_path('app/public/items/files'), $file1);

                $filesave = new File;
                $filesave->item_id = $itemid;
                $filesave->path =  'storage/items/files/'.$file1;
                $filesave->save();
            }
        }
        

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
