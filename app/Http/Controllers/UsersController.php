<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\profile;
use App\Http\Requests\StoreUsersRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('hal.reg666', [
            "title" => "Register"
        ]);
    }

    public function show()
    {
        $userID = Auth::user()->userid;


        $user = profile::where('userid', $userID)->first();

        return view('hal.profile', [
            "title" => "Profile",
            "user" => $user,
        ]);
    }

    public function showprofile($id)
    {
        $user = profile::where('userid', $id)->first();

        return view('hal.userprofile', [
            "title" => "Profile",
            "user" => $user,
        ]);
    }

    public function editProfile(Request $request)
{
    $user = Auth::user();

    
    $request->validate([
        'photo_profile' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        'describe_profile' => 'nullable|string|max:50',
        'link_acc' => 'nullable|string',
    ]);

    // Handle file upload
    if ($request->hasFile('photo_profile')) {
        // Delete the previous profile photo
        if ($user->profile->photo_profile) {
            Storage::delete('public/profile_photos/' . $user->profile->photo_profile);
        }

        $file = $request->file('photo_profile');
        $fileName = time() . '_' . $file->getClientOriginalName();
        Storage::putFileAs('public/profile_photos', $file, $fileName);// Adjust the storage path as needed

        // Update the user's photo_profile field
        $user->profile->photo_profile = $fileName;
    }

    
    $user->name = $request->input('name');
    $user->profile->describe_profile = $request->input('describe_profile');
    $user->profile->link_acc = $request->input('link_acc');

    
    $user->save();
    $user->profile->save();

    return redirect('/profile/' . Auth::user()->userid)->with('success', 'Profile updated successfully'); // 
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
    public function store(StoreUsersRequest $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->level = $request->input('level');
        $user->save();
        return redirect()->route('login')->with('success', 'User successfully registered. Please login.');

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
