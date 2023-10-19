<?php

namespace App\Http\Controllers;

use App\Models\CarouselHeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class CarouselHeroSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lists = CarouselHeroSection::all();
        return view('admin.pages.Hero.index', compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.Hero.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'string',
            'description' => 'string',
            'image' => 'nullable',
            'url' => 'nullable',
        ]);

        $list = new CarouselHeroSection();

        $ulpoadPath = 'uploads/images/hero/';
        if ($request->hasFile('image'))
        {
            $file     = $request->file('image');
            $ext      = $file->getClientOriginalExtension();
            $filename = time(). '.'. $ext;
            $file->move('uploads/images/hero/', $filename);
            $list->image = $ulpoadPath.$filename;
        }

        $list->title = $request->title;
        $list->description = $request->description;
        $list->url = $request->url;

        $list->save();

        Session::flash('message', 'Successfully created image');

        return redirect()->route('hero.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $list = CarouselHeroSection::all()->where('id', $id)->first();
        return view('pages.showDetails', compact('list'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $list = CarouselHeroSection::all()->where('id', $id)->first();
        return view('admin.pages.Hero.edit', compact('list'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'link' => 'nullable|string',
            'image' => 'nullable',
        ]);

        $list = CarouselHeroSection::findOrFail($id)->where('id', $id)->first();

        $image = $request->file('image');
        $upload_path = "uploads/images/hero/";
        $new_image = "";

        if ($request->hasFile('image'))
        {
            if (File::exists($list->image))
            {
                File::delete($list->image);
            }
            $extension = $image->getClientOriginalExtension();
            $filename  = time().'.' .$extension;
            $image->move($upload_path, $filename);
            $new_image = $upload_path.$filename;
            $list->update([
                'image' => $new_image,
            ]);
        }

        if ($list):
            $list->update([
                'title' =>$request->title,
                'description' =>$request->description,
                'link' =>$request->link,
            ]);
            return redirect()->route('hero.edit', $id)->with('message', 'Product Updated Successfuly');
        endif;

        return redirect()->route('hero.edit', $id)->with('message', 'Product Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $list = CarouselHeroSection::findOrFail($id);

        if ($list->image){
            if (File::exists($list->image))
            {
                File::delete($list->image);
            }
        }

        $list->delete();

        return redirect()->back()->with('message', 'Product Deleted');
    }
}
