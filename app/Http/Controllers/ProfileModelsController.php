<?php

namespace App\Http\Controllers;

use App\Models\ProfileModels;
use Illuminate\Http\Request;

class ProfileModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("pages.profile.index");
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
    public function show(ProfileModels $profileModels)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfileModels $profileModels)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProfileModels $profileModels)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfileModels $profileModels)
    {
        //
    }
}
