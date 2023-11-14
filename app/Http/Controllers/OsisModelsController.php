<?php

namespace App\Http\Controllers;

use App\Models\OsisModels;
use Illuminate\Http\Request;

class OsisModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("pages.osis.index");
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
    public function show(OsisModels $osisModels)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OsisModels $osisModels)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OsisModels $osisModels)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OsisModels $osisModels)
    {
        //
    }
}
