<?php

namespace App\Http\Controllers;

use App\Models\SiswaModels;
use Illuminate\Http\Request;

class SiswaModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("pages.students.index");

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
    public function show(SiswaModels $siswaModels)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SiswaModels $siswaModels)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SiswaModels $siswaModels)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SiswaModels $siswaModels)
    {
        //
    }
}
