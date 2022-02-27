<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Community;
use Collator;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sliders = Slider::get();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();

        return response()->json(['success' => true, 'message' => 'Slider Deleted']);
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.sliders.create', compact('slider'));
    }

    public function store()
    {
        $validatedData = request()->validate([
            'file' => 'required'
        ]);
        
        $slider = new Slider;
        if(request()->hasFile('file'))
        {
            $image = time().'.'.request()->file->extension();
            $slider->path = 'sliders/'.$image;
            request()->file->move(public_path('sliders'), $image);
        }
        $slider->status = request()->status == 'active' ? true : false;
        $slider->save();

        return response()->json(['success' => true, 'message' => 'New Item Created.']);
    }

    public function update($id)
    {
        $validatedData = request()->validate([
            'name' => 'required'
        ]);
        
        $slider = Slider::find($id);
        if(request()->hasFile('file'))
        {
            $image = time().'.'.request()->file->extension();
            $slider->path = 'sliders/'.$image;
            request()->file->move(public_path('sliders'), $image);
        }
        $slider->status = request()->status == 'active' ? true : false;
        $slider->update();

        return response()->json(['success' => true, 'message' => 'New Slider Updated.']);
    }
}
