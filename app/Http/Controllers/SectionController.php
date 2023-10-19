<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Image;
use App\Models\Offer;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::all();
        $countries = Country::all();
        return view('admin.pages.sections.index', compact('sections', 'countries'));
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
            'name' => 'required|string',
            'title' => 'nullable|string',
            'body' => 'nullable|string',
            'image' => 'required',
            'country_id' => 'required|integer',
        ]);

        $section = new Section();

        $ulpoadPath = 'uploads/images/sections/';
        if ($request->hasFile('image'))
        {
            $file     = $request->file('image');
            $ext      = $file->getClientOriginalExtension();
            $filename = time(). '.'. $ext;
            $file->move($ulpoadPath, $filename);
            $section->image = $ulpoadPath.$filename;
        }

        $section->name = $request->name;
        $section->title = $request->title;
        $section->body = $request->body;
        $section->country_id = $request->country_id;

        $section->save();

        Session::flash('message', 'Successfully created Deal');

        return redirect()->route('sections.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $section = Section::findOrFail($id);
        $images = Image::all()->where('section_id', $id);
        return view('pages.showDetails', compact('section', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $section = Section::find($id);
        $countries = Country::all();
        return view('admin.pages.sections.edit', compact('section', 'countries'));
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
        $section = Section::findOrFail($id);

        if ($section->image){
            if (File::exists($section->image))
            {
                File::delete($section->image);
            }
        }

        $section->delete();

        return redirect()->route('sections.index')->with('message', 'Product Deleted');
    }
}
