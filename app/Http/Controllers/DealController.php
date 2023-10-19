<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deals = Deal::all();
        return view('admin.pages.deals.index', compact('deals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.deals.create');
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
            'url' => 'nullable',
        ]);

        $deal = new Deal();

        $ulpoadPath = 'uploads/images/deals/';
        if ($request->hasFile('image'))
        {
            $file     = $request->file('image');
            $ext      = $file->getClientOriginalExtension();
            $filename = time(). '.'. $ext;
            $file->move('uploads/images/deals/', $filename);
            $deal->image = $ulpoadPath.$filename;
        }

        $deal->title = $request->title;
        $deal->body = $request->body;
        $deal->url = $request->url;

        $deal->save();

        Session::flash('message', 'Successfully created Deal');

        return redirect()->route('deals.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $deal = Deal::all()->where('id', $id)->first();
        return view('pages.showDetails', compact('deal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $deal = Deal::all()->where('id', $id)->first();
        return view('admin.pages.deals.edit', compact('deal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string',
            'body' => 'nullable|string',
            'link' => 'nullable|string',
            'image' => 'nullable',
        ]);

        $deal = Deal::findOrFail($id)->where('id', $id)->first();

        $image = $request->file('image');
        $upload_path = "uploads/images/deals/";
        $new_image = "";

        if ($request->hasFile('image'))
        {
            if (File::exists($deal->image))
            {
                File::delete($deal->image);
            }
            $extension = $image->getClientOriginalExtension();
            $filename  = time().'.' .$extension;
            $image->move($upload_path, $filename);
            $new_image = $upload_path.$filename;
            $deal->update([
                'image' => $new_image,
            ]);
        }

        if ($deal):
            $deal->update([
                'title' =>$request->title,
                'body' =>$request->body,
                'link' =>$request->link,
            ]);
            return redirect()->route('deals.edit', $id)->with('message', 'Product Updated Successfuly');
        endif;

        return redirect()->route('deals.edit', $id)->with('message', 'Product Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deal = Deal::findOrFail($id);

        if ($deal->image){
            if (File::exists($deal->image))
            {
                File::delete($deal->image);
            }
        }

        $deal->delete();

        return redirect()->back()->with('message', 'Product Deleted');
    }
}
