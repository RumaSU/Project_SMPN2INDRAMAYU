<?php

namespace App\Http\Controllers;

use App\Models\ClassesModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassesModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tempClass = DB::table("classes")->select('tag')->distinct()->get();
        $listClass = [];
        
        foreach ($tempClass as $tag) {
            // Mengambil data 'class' dari tabel 'classes' sesuai dengan setiap 'tag'
            $class = DB::table('classes')
                        ->where('tag', $tag->tag)
                        ->pluck('class')
                        ->toArray();
                        
            // Menambahkan hasil ke dalam array yang dibuat
            $listClass[] = [
                'Tag' => $tag->tag,
                'Class' => $class,
            ];
        }
        
        return view("pages.students.index", compact("listClass"));
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
        $classes = ClassesModels::create([
            'teacher_class' => $request->teacher,
            'class' => $request->tagClass,
            'tag' => $request->classList
        ]);
        if ($classes) {
            return redirect()->back()->with('status','Classes Added Successfully');
        } else {
            return redirect();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassesModels $classesModels)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassesModels $classesModels)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassesModels $classesModels)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassesModels $classesModels)
    {
        //
    }
}
