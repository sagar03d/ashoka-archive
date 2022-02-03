<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $menus = Menu::with('menu')->where('menu_id', null)->get();
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        return view('admin.menus.create');
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();

        return response()->json(['success' => true, 'message' => 'Menu Deleted']);
    }

    public function edit(Menu $menu)
    {
        return view('admin.menus.create', compact('menu'));
    }

    public function store()
    {
        $validatedData = request()->validate([
            'name' => 'required',
            'url' => 'required'
        ]);
        
        $menu = new \App\Models\Menu;
        $menu->name = request()->name;
        $menu->url = request()->url;
        $menu->save();

        return response()->json(['success' => true, 'message' => 'New Menu Created.']);
    }

    public function update($id)
    {
        $validatedData = request()->validate([
            'name' => 'required',
            'url' => 'required'
        ]);
        
        $menu = \App\Models\Menu::find($id);
        $menu->name = request()->name;
        $menu->url = request()->url;
        $menu->update();

        return response()->json(['success' => true, 'message' => 'New Menu Updated.']);
    }
}
