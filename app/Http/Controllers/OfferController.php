<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class OfferController extends Controller
{
    /**
     * Display a offering of the resource.
     */
    public function index()
    {
        $offers = Offer::all();
        return view('admin.pages.offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.offers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'image' => 'required',
            'category' => 'required|integer',
            'url' => 'nullable',
        ]);

        $offer = new Offer();

        $ulpoadPath = 'uploads/images/offers/';
        if ($request->hasFile('image'))
        {
            $file     = $request->file('image');
            $ext      = $file->getClientOriginalExtension();
            $filename = time(). '.'. $ext;
            $file->move('uploads/images/offers/', $filename);
            $offer->image = $ulpoadPath.$filename;
        }

        $offer->title = $request->title;
        $offer->body = $request->body;
        $offer->url = $request->url;
        $offer->category = $request->category;

        $offer->save();

        Session::flash('message', '');

        return redirect()->route('offers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $offer = Offer::all()->where('id', $id)->first();
        return view('pages.showDetails', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $offer = Offer::all()->where('id', $id)->first();

        return view('admin.pages.offers.edit', compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string',
            'body' => 'nullable|string',
            'url' => 'nullable|string',
            'category' => 'nullable|integer',
            'image' => 'nullable',
        ]);

        $offer = Offer::findOrFail($id)->where('id', $id)->first();

        $image = $request->file('image');
        $upload_path = "uploads/images/offers/";
        $new_image = "";

        if ($request->hasFile('image'))
        {
            if (File::exists($offer->image))
            {
                File::delete($offer->image);
            }
            $extension = $image->getClientOriginalExtension();
            $filename  = time().'.' .$extension;
            $image->move($upload_path, $filename);
            $new_image = $upload_path.$filename;
            $offer->update([
                'image' => $new_image,
            ]);
        }

        if ($offer):
            $offer->update([
                'title' =>$request->title,
                'body' =>$request->body,
                'url' =>$request->url,
                'category' =>$request->category,
            ]);
            return redirect()->route('offers.edit', $id)->with('message', 'Product Updated Successfuly');
        endif;

        return redirect()->route('offers.edit', $id)->with('message', 'Product Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $offer = Offer::findOrFail($id);

        if ($offer->image){
            if (File::exists($offer->image))
            {
                File::delete($offer->image);
            }
        }

        $offer->delete();

        return redirect()->back()->with('message', 'Product Deleted');
    }
}
