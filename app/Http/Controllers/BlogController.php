<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Blog::all()->where('category', 1);
        $trips = Blog::all()->where('category', 2);
        $shirts = Blog::all()->where('category', 3);
        $discoveries = Blog::all()->where('category', 4);
        $archives = Blog::all()->where('category', 5);

        $countries = Country::all();
        return view('admin.pages.blogs.index', compact( 'countries', 'articles', 'trips', 'shirts', 'discoveries', 'archives'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if ($request->category == 1) {
            $validate = $request->validate([
                'title' => 'required|string',
                'body' => 'required|string',
                'country_id' => 'required|integer',
                'category' => 'required|integer',
                'image' => 'required',
            ]);
            $blog = new Blog();
            $ulpoadPath = 'uploads/images/blogs/';

            if ($request->hasFile('image'))
            {
                $file     = $request->file('image');
                $ext      = $file->getClientOriginalExtension();
                $filename = time(). '.'. $ext;
                $file->move('uploads/images/blogs/', $filename);
                $blog->image = $ulpoadPath.$filename;
            }
            $blog->title = $request->title;
            $blog->body = $request->body;
            $blog->country_id = $request->country_id;
            $blog->category = $request->category;
            $blog->save();
        } elseif ($request->category == 2) {
            $validate = $request->validate([
                'title' => 'required|string',
                'body' => 'required|string',
                'category' => 'required|integer',
                'image' => 'required',
            ]);
            $blog = new Blog();
            $ulpoadPath = 'uploads/images/blogs/';

            if ($request->hasFile('image'))
            {
                $file     = $request->file('image');
                $ext      = $file->getClientOriginalExtension();
                $filename = time(). '.'. $ext;
                $file->move('uploads/images/blogs/', $filename);
                $blog->image = $ulpoadPath.$filename;
            }
            $blog->title = $request->title;
            $blog->body = $request->body;
            $blog->category = $request->category;
            $blog->save();
        } elseif ($request->category == 3) {
            $validate = $request->validate([
                'country_id' => 'required|integer',
                'image' => 'required',
                'category' => 'required|integer',
            ]);
            $blog = new Blog();
            $ulpoadPath = 'uploads/images/blogs/';

            if ($request->hasFile('image'))
            {
                $file     = $request->file('image');
                $ext      = $file->getClientOriginalExtension();
                $filename = time(). '.'. $ext;
                $file->move('uploads/images/blogs/', $filename);
                $blog->image = $ulpoadPath.$filename;
            }
            $blog->country_id = $request->country_id;
            $blog->category = $request->category;
            $blog->save();
        } elseif ($request->category == 4) {
            $validate = $request->validate([
                'url' => 'nullable|string',
                'image' => 'required',
                'category' => 'required|integer',
            ]);
            $blog = new Blog();
            $ulpoadPath = 'uploads/images/blogs/';

            if ($request->hasFile('image'))
            {
                $file     = $request->file('image');
                $ext      = $file->getClientOriginalExtension();
                $filename = time(). '.'. $ext;
                $file->move('uploads/images/blogs/', $filename);
                $blog->image = $ulpoadPath.$filename;
            }
            $blog->url = $request->url;
            $blog->category = $request->category;
            $blog->save();
        } elseif ($request->category == 5) {
            $validate = $request->validate([
                'image' => 'required',
                'category' => 'required|integer',
            ]);
            $blog = new Blog();
            $ulpoadPath = 'uploads/images/blogs/';

            if ($request->hasFile('image'))
            {
                $file     = $request->file('image');
                $ext      = $file->getClientOriginalExtension();
                $filename = time(). '.'. $ext;
                $file->move('uploads/images/blogs/', $filename);
                $blog->image = $ulpoadPath.$filename;
            }
            $blog->category = $request->category;
            $blog->save();
        }

        Session::flash('message', 'Successfully created Blog');

        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::all()->where('id', $id)->first();
        return view('pages.showDetails', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Blog::find($id)->category;
        $item = Blog::find($id);
        $countries = Country::all();
        return view('admin.pages.blogs.edit', compact('item', 'category', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        // 1 => articles
        // 2 => trips
        // 3 => shirts
        // 4 => discovery
        // 5 => archive
        if ($blog->category == 1) {
            $validate = $request->validate([
                'title' => 'nullable|string',
                'body' => 'nullable|string',
                'country_id' => 'nullable|integer',
                'image' => 'nullable',
            ]);

            $image = $request->file('image');
            $upload_path = "uploads/images/blogs/";
            if ($request->hasFile('image'))
            {
                if (File::exists($blog->image))
                {
                    File::delete($blog->image);
                }
                $extension = $image->getClientOriginalExtension();
                $filename  = time().'.' .$extension;
                $image->move($upload_path, $filename);
                $blog->update([
                    'image' => $upload_path.$filename,
                ]);
            }
            $blog->update([
                'title' =>$request->title,
                'body' =>$request->body,
                'country_id' =>$request->country_id,
            ]);
            return redirect()->route('blogs.edit', $blog)->with('message', 'Product Updated Successfuly');
        } elseif ($blog->category == 2) {
            $validate = $request->validate([
                'title' => 'nullable|string',
                'body' => 'nullable|string',
                'image' => 'nullable',
            ]);

            $image = $request->file('image');
            $upload_path = "uploads/images/blogs/";
            if ($request->hasFile('image'))
            {
                if (File::exists($blog->image))
                {
                    File::delete($blog->image);
                }
                $extension = $image->getClientOriginalExtension();
                $filename  = time().'.' .$extension;
                $image->move($upload_path, $filename);
                $new_image = $upload_path.$filename;
                $blog->update([
                    'image' => $upload_path.$filename,
                ]);
            }
            $blog->update([
                'title' =>$request->title,
                'body' =>$request->body,
            ]);
            return redirect()->route('blogs.edit', $blog)->with('message', 'Product Updated Successfuly');
        } elseif ($blog->category == 3) {
            $validate = $request->validate([
                'country_id' => 'nullable|integer',
                'image' => 'nullable',
            ]);

            $image = $request->file('image');
            $upload_path = "uploads/images/blogs/";
            $new_image = "";

            if ($request->hasFile('image'))
            {
                if (File::exists($blog->image))
                {
                    File::delete($blog->image);
                }
                $extension = $image->getClientOriginalExtension();
                $filename  = time().'.' .$extension;
                $image->move($upload_path, $filename);
                $new_image = $upload_path.$filename;
                $blog->update([
                    'image' => $new_image,
                ]);
            }

            $blog->update([
                'country_id' =>$request->country_id,
            ]);
            return redirect()->route('blogs.edit', $blog)->with('message', 'Product Updated Successfuly');
        } elseif ($blog->category == 4) {
            $validate = $request->validate([
                'url' => 'nullable|string',
                'image' => 'nullable',
            ]);
            $image = $request->file('image');
            $upload_path = "uploads/images/blogs/";
            $new_image = "";

            if ($request->hasFile('image'))
            {
                if (File::exists($blog->image))
                {
                    File::delete($blog->image);
                }
                $extension = $image->getClientOriginalExtension();
                $filename  = time().'.' .$extension;
                $image->move($upload_path, $filename);
                $new_image = $upload_path.$filename;
                $blog->update([
                    'image' => $new_image,
                ]);
            }

            $blog->update([
                'url' =>$request->url,
            ]);
            return redirect()->route('blogs.edit', $blog)->with('message', 'Product Updated Successfuly');

        } elseif ($blog->category == 5) {
            $validate = $request->validate([
                'image' => 'nullable',
            ]);
            $image = $request->file('image');
            $upload_path = "uploads/images/blogs/";
            $new_image = "";

            if ($request->hasFile('image'))
            {
                if (File::exists($blog->image))
                {
                    File::delete($blog->image);
                }
                $extension = $image->getClientOriginalExtension();
                $filename  = time().'.' .$extension;
                $image->move($upload_path, $filename);
                $new_image = $upload_path.$filename;
                $blog->update([
                    'image' => $new_image,
                ]);
            }

            return redirect()->route('blogs.edit', $blog)->with('message', 'Product Updated Successfuly');
        }

        // Session::flash('message', 'Successfully created Blog');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->image){
            if (File::exists($blog->image))
            {
                File::delete($blog->image);
            }
        }

        $blog->delete();

        return redirect()->back()->with('message', 'Product Deleted');
    }

    public function filterArticle (?string $id) {
        if ($id == 0) {
            $articles = Blog::all()->where('category', 1);
            return response()->json(array('articles'=> $articles), 200);
        } else {
            $articles = Blog::all()->where('category', 1)->where('country_id', $id);
            return response()->json(array('articles'=> $articles), 200);
        }
    }

    public function viewToUsers (?string $type = null) {
        if ($type === null) {
            $articles = Blog::all()->where('category', 1);
            return view('pages.gallery', compact('articles'));
        }
        elseif ($type === 'trips') {
            $trips = Blog::all()->where('category', 2);
            return view('pages.gallery', compact('trips'));
        }
        elseif ($type === 'shirts') {
            $shirts = Blog::all()->where('category', 3);
            return view('pages.gallery', compact('shirts'));
        }
        elseif ($type === 'discoveries') {
            $discoveries = Blog::all()->where('category', 4);
            return view('pages.gallery', compact('discoveries'));
        }
        elseif ($type === 'archives') {
            $archives = Blog::all()->where('category', 5);
            return view('pages.gallery', compact('archives'));
        } else {
            abort(404);
        }
    }
}
