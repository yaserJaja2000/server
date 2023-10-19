<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinations = Destination::all();
        return view('admin.pages.destinations.index', compact('destinations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.destinations.create');
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

        $list = new Destination();

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        //
    }
}
