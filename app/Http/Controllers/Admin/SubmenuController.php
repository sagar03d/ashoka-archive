<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Str;

class SubmenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $submenus = Menu::where('menu_id', $id)->get();
        $menu = Menu::find($id);
        return view('admin.submenus.index', compact('submenus','menu'));
    }

    public function create($id)
    {
        $menu = Menu::find($id);
        return view('admin.submenus.create', compact('menu'));
    }

    public function destroy($menuid, $id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        
        //Delete submenus
        $submenus = Menu::where('menu_id', $id)->delete();
        
        return response()->json(['success' => true, 'message' => 'Menu Deleted']);
    }

    public function edit($menuid, $submenuid)
    {
        $menu = Menu::find($menuid);
        $submenu = Menu::where('id', $submenuid)->first();
        return view('admin.submenus.create', compact('menu','submenu'));
    }

    public function store($menuid)
    {
        $validatedData = request()->validate([
            'name' => 'required',
            'url' => 'required'
        ]);
        
        $menu = new \App\Models\Menu;
        $menu->name = request()->name;
        $menu->url = request()->url;
        $menu->menu_id = $menuid;
        $menu->save();

        return response()->json(['success' => true, 'message' => 'New Menu Created.']);
    }

    public function update($menuid, $id)
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
