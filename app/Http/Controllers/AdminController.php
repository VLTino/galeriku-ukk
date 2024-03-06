<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gallery;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $usercount = User::where('level','user')->count();
        $admincount = User::where('level','admin')->count();
        $gambarall = Gallery::all()->count();
    
        $gambarcount = Gallery::select(
            DB::raw('DATE_FORMAT(created_at, "%M") AS date'),
            DB::raw('COUNT(*) AS count')
        )
            ->groupBy(DB::raw('DATE_FORMAT(created_at, "%M")'))
            ->orderBy(DB::raw('DATE_FORMAT(created_at, "%M")'))
            ->get();
    
        return view('hal.admin', [
            "title" => "Admin",
            "gambarcount" => $gambarcount,
            "usercount" =>  $usercount,
            "admincount" => $admincount,
            "gambarall" => $gambarall
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
    public function store(Request $request)
    {
        //
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