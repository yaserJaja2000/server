<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Image;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::all();
        return view('admin.pages.countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'icon' => 'nullable',
        ]);

        $country = new Country();

        $ulpoadPath = 'uploads/icons/countries/';
        if ($request->hasFile('icon'))
        {
            $file     = $request->file('icon');
            $ext      = $file->getClientOriginalExtension();
            $filename = time(). '.'. $ext;
            $file->move('uploads/icons/countries/', $filename);
            $country->icon = $ulpoadPath.$filename;
        }

        $country->name = $request->name;

        $country->save();

        Session::flash('message', 'Successfully created Country');

        return redirect()->route('countries.index');
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
        $country = Country::all()->where('id', $id)->first();
        return view('admin.pages.countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string',
            'icon' => 'nullable',
        ]);

        $country = Country::findOrFail($id)->where('id', $id)->first();

        $image = $request->file('icon');
        $upload_path = "uploads/icons/countries/";
        $new_image = "";

        if ($request->hasFile('icon'))
        {
            if (File::exists($country->image))
            {
                File::delete($country->image);
            }
            $extension = $image->getClientOriginalExtension();
            $filename  = time().'.' .$extension;
            $image->move($upload_path, $filename);
            $new_image = $upload_path.$filename;
            $country->update([
                'icon' => $new_image,
            ]);
        }

        if ($country):
            $country->update([
                'name' =>$request->name,
            ]);
            return redirect()->route('countries.edit', $id)->with('message', 'Product Updated Successfuly');
        endif;

        return redirect()->route('countries.edit', $id)->with('message', 'Product Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $country = Country::findOrFail($id);

        if ($country->icon){
            if (File::exists($country->icon))
            {
                File::delete($country->icon);
            }
        }

        $country->delete();

        return redirect()->back()->with('message', 'Product Deleted');
    }
}
