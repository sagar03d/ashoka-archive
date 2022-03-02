<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Collection;
use App\Models\Community;
use App\Models\Metadata;
use Collator;
use Illuminate\Support\Str;

class MetadataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($itemid)
    {
        $metadatas = Metadata::where('item_id', $itemid)->get();
        return view('admin.metadata.show', compact('metadatas'));
    }

    public function destroy($id)
    {
        $metadata = Metadata::find($id);
        if($metadata){
            $metadata->delete();
        }
        else{
            return response()->json(['success' => false, 'message' => 'Something went wrong!']);
        }
        
        return response()->json(['success' => true, 'message' => 'Metadata Deleted']);
    }
    /* 
    public function create($collectionid)
    {
        $collection = Collection::find($collectionid);
        return view('admin.items.create', compact('collection'));
    }

    public function edit($collectionid, $id)
    {
        $item = Item::find($id);
        $collection = Collection::find($collectionid);
        return view('admin.items.create', compact('item', 'collection'));
    }

    public function csv_to_array($filename = '', $delimiter = ',') {
		if (!file_exists($filename) || !is_readable($filename))
			return FALSE;

		$header = NULL;
		$data = array();
		if (($handle = fopen($filename, 'r')) !== FALSE) {
			while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
				if (!$header){
					$header = $row;
                }
				else{
                    if(count($header) == count($row)){
                        $data[] = array_combine($header, $row);
                    }
                }
			}
			fclose($handle);
		}
		return $data;
	}
    
    public function store($collectionid)
    {
        $validatedData = request()->validate([
            'name' => 'required'
        ]);
        
        $item = new Item;
        $item->name = request()->name;

        if(request()->hasFile('file'))
        {
            $image = time().'.'.request()->file->extension();
            $item->metadata_file = 'metadata/'.$image;
            request()->file->move(public_path('metadata'), $image);
        }

        $item->collection_id = $collectionid;
        $item->save();

        $metadataarr = $this->csv_to_array($item->metadata_file,',');
        foreach($metadataarr as $metadata)
        {
            foreach($metadata as $key => $md)
            {
                $newmetadata = new Metadata();
                $newmetadata->item_id = $item->id;
                $newmetadata->field = $key;
                $newmetadata->value = $md;
                $newmetadata->save();
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
        if(request()->hasFile('file'))
        {
            $image = time().'.'.request()->file->extension();
            $item->metadata_file = 'metadata/'.$image;
            
            request()->file->move(public_path('metadata'), $image);
        }
        
        $item->update();

        $metadataarr = $this->csv_to_array($item->metadata_file,',');
        foreach($metadataarr as $key => $metadata)
        {
            $newmetadata = new Metadata();
            $newmetadata->item_id = $item->id;
            $newmetadata->field = $key;
            $newmetadata->value = $metadata;
            $newmetadata->save();
        }

        return response()->json(['success' => true, 'message' => 'New Item Updated.']);
    }
    */
}
