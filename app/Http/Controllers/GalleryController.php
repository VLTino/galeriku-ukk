<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoregalleryRequest;
use Illuminate\Http\Request;
use App\Models\gallery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function home()
     {
        $query = request('query');

        $posts = Gallery::when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->whereHas('user', function ($userQuery) use ($query) {
                $userQuery->where('name', 'like', "%$query%");
            })->orWhere('describe_photo', 'like', "%$query%");
        })->get();

         return view('hal.home', [
             "title" => "Dashboard",
             "posts" => $posts,
         ]);
     }

     public function upload()
     {
         return view('hal.upload', [
             "title" => "Upload"
         ]);
     }

     

     public function index()
    {

        $userID = Auth::user()->userid;


        $posts = gallery::where('userid', $userID)->get();

        return view('hal.galeriku', [
            "title" => "Galeriku",
            "posts" => $posts,
        ]);
    }

    public function detail(gallery $post)
    {
        return view('hal.detail', [
            "title" => "Detail",
            "post" => $post,
        ]);
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
    public function store(StoregalleryRequest $request)
    {
        $gallery = new Gallery();
        $gallery->describe_photo = $request->input('describe_photo');
        $gallery->userid = $request->input('userid');
        $gallery->like_post = $request->input('like_post');

        // Handling file upload
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Save image to storage
            Storage::putFileAs('public/img', $image, $imageName);

            // Save image name to database
            $gallery->gambar = $imageName;
        }

        $gallery->save();

        return redirect()->route('galeriku')->with('success', 'Gambar berhasil ditambahkan');
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
