<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $type = "settings";
        $user = User::findOrFail(auth()->user()->id);
        $setting = Setting::all()->where('id', $id)->first();
        return view('admin.pages.settings.edit', compact('setting', 'type', 'user'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            $request->url => 'nullable|string',
            $request->country => 'nullable|string',
            $request->city => 'nullable|string',
            $request->phone => 'nullable|string',
            $request->facebook => 'nullable|string',
            $request->instagram => 'nullable|string',
            $request->whatsapp => 'nullable|string',
            $request->twitter => 'nullable|string',
            $request->telegram => 'nullable|string',
            $request->url_email => 'nullable|string',
            $request->googl_play => 'nullable|string',
            $request->app_store => 'nullable|string',
        ]);

        $setting = Setting::findOrFail($id)->first();

        if ($setting):
            $setting->update([
                'url' =>$request->url,
                'country' =>$request->country,
                'city' =>$request->city,
                'phone' =>$request->phone,
                'facebook' =>$request->facebook,
                'instagram' =>$request->instagram,
                'whatsapp' =>$request->whatsapp,
                'twitter' =>$request->twitter,
                'telegram' =>$request->telegram,
                'url_email' =>$request->url_email,
                'googl_play' =>$request->googl_play,
                'app_store' =>$request->app_store,
            ]);
            return redirect()->route('settings.edit', $id)->with('message', 'Product Updated Successfuly');
        endif;

        return redirect()->route('settings.edit', $id)->with('message', 'Product Updated Successfuly');
        // if ($request->hasFile('image'))
        // {
        //     $upload_path = "uploads/product/";
        //     $i = 0;
        //     foreach($request->file('image') as $image_file)
        //     {
        //         $extention = $image_file->getClientOriginalExtension();
        //         $filename  = time(). $i++ . '.' .$extention;
        //         $image_file->move($upload_path, $filename);
        //         $final_image_pathname = $upload_path.$filename;
        //         $product->productImages()->create([
        //             'product_id' => $product->id,
        //             'image'      => $final_image_pathname,
        //         ]);
        //     }
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
