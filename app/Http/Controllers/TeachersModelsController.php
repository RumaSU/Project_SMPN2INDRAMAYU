<?php

namespace App\Http\Controllers;

use App\Models\TeachersModels;
use Illuminate\Http\Request;

class TeachersModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("pages.teachers.index");
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
    public function show(TeachersModels $teachersModels)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeachersModels $teachersModels)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TeachersModels $teachersModels)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeachersModels $teachersModels)
    {
        //
    }
}
