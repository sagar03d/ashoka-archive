<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Community;
use Illuminate\Support\Str;

class CommunityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $communities = Community::with('community')->where('community_id', null)->get();
        return view('admin.communities.index', compact('communities'));
    }

    public function create()
    {
        return view('admin.communities.create');
    }

    public function destroy($id)
    {
        $community = Community::find($id);
        $community->delete();

        return response()->json(['success' => true, 'message' => 'Community Deleted']);
    }

    public function edit($id)
    {
        $community = Community::find($id);
        return view('admin.communities.create', compact('community'));
    }

    public function store()
    {
        $validatedData = request()->validate([
            'name' => 'required'
        ]);
        
        $community = new Community;
        $community->name = request()->name;
        $community->save();

        return response()->json(['success' => true, 'message' => 'New Community Created.']);
    }

    public function update($id)
    {
        $validatedData = request()->validate([
            'name' => 'required'
        ]);
        
        $community = Community::find($id);
        $community->name = request()->name;
        $community->update();

        return response()->json(['success' => true, 'message' => 'New Community Updated.']);
    }
}
