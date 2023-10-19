<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::all();
        $images = Image::all();
        return view('admin.pages.images.index', compact('images', 'sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'image' => 'required',
            'section_id' => 'required|integer',
            'link' => 'nullable',
        ]);

        $image = new Image();

        $ulpoadPath = 'uploads/images/images/';
        if ($request->hasFile('image'))
        {
            $file     = $request->file('image');
            $ext      = $file->getClientOriginalExtension();
            $filename = time(). '.'. $ext;
            $file->move($ulpoadPath, $filename);
            $image->image = $ulpoadPath.$filename;
        }

        $image->link = $request->link;
        $image->section_id = $request->section_id;

        $image->save();

        Session::flash('message', 'Successfully created Deal');

        return redirect()->route('images.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $image = Image::find($id);
        $sections = Section::all();
        return view('admin.pages.images.edit', compact('image', 'sections'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = Section::findOrFail($id);

        if ($image->image){
            if (File::exists($image->image))
            {
                File::delete($image->image);
            }
        }

        $image->delete();

        return redirect()->route('images.index')->with('message', 'Product Deleted');
    }
}
