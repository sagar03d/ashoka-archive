<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Community;
use Illuminate\Support\Str;

class SubCommunityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $subcommunities = Community::where('community_id', $id)->get();
        $community = Community::find($id);
        return view('admin.subcommunities.index', compact('subcommunities','community'));
    }

    public function create($id)
    {
        $community = Community::find($id);
        return view('admin.subcommunities.create', compact('community'));
    }

    public function destroy($communityid, $id)
    {
        $community = Community::find($id);
        $community->delete();
        
        //Delete submenus
        $subcommunities = Community::where('community_id', $id)->delete();
        
        return response()->json(['success' => true, 'message' => 'Community Deleted']);
    }

    public function edit($communityid, $subcommunitynid)
    {
        $community = Community::find($communityid);
        $subcommunity = Community::where('id', $subcommunitynid)->first();
        return view('admin.subcommunities.create', compact('community','subcommunity'));
    }

    public function store($communityid)
    {
        $validatedData = request()->validate([
            'name' => 'required'
        ]);
        
        $subcommunity = new Community;
        $subcommunity->name = request()->name;
        $subcommunity->community_id = $communityid;
        $subcommunity->save();

        return response()->json(['success' => true, 'message' => 'New Sub Community Created.']);
    }

    public function update($communityid, $id)
    {
        $validatedData = request()->validate([
            'name' => 'required'
        ]);
        
        $community = Community::find($id);
        $community->name = request()->name;
        $community->update();

        return response()->json(['success' => true, 'message' => 'Community Updated.']);
    }
}
