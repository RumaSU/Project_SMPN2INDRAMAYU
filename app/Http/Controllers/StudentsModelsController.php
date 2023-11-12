<?php

namespace App\Http\Controllers;

use App\Models\StudentsModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsModelsController extends Controller
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
    public function show(StudentsModels $studentsModels)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentsModels $studentsModels)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentsModels $studentsModels)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentsModels $studentsModels)
    {
        //
    }
}
