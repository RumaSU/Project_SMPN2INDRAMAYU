<?php

namespace App\Http\Controllers;

use App\Models\StudentsModels;
use App\Models\ClassesModels;
use App\Models\ClassesImagesModels;
use App\Models\ClassesStudentsModels;
use App\Models\TeachersModels;
use App\Models\TeachersImagesModels;
use App\Models\TeachersSocmedModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Uuid;


class StudentsModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($classGrade, $classTag, Request $request)
    {
        $idClass = $request->ic;
        $isClassFound = ClassesModels::where('class_grade', $classGrade)
            ->where('class_tag', $classTag)
            ->where('class_id', $idClass)
            ->exists();
        // if($isClassFound) {
        //     $countStudentInClass = ClassesStudentsModels::where('class_id', $idClass)->count();
        //     if($countStudentInClass > 0) {
        //         $listStudents = DB::table('students')
        //             ->join('students_images', 'students.student_id', '=', 'students_images.student_id')
        //             ->join('classes', 'classes.class_id', '=', 'classes_students.class_id')
        //             ->join('classes_students', 'classes_students.class_id', '=', 'classes.class_id')
        //             ->where('classes.class_id', '=', $idClass)
        //             ->get();
                
        //         return view("pages.students.index", compact('listStudents'));
        //     }
        // }
        // $listStudents = DB::table('students')
        //     ->join('students_images', 'students.student_id', '=', 'students_images.student_id')
        //     ->join('classes', 'classes.class_id', '=', 'classes_students.class_id')
        //     ->join('classes_students', 'classes_students.class_id', '=', 'classes.class_id')
        //     ->where('classes.class_id', '=', $idClass)
        //     ->get();
        $teacherClass = DB::table('teachers')
            ->join('teachers_images', 'teachers_images.teacher_id', '=', 'teachers.teacher_id')
            ->join('classes', 'classes.teacher_id', '=', 'teachers.teacher_id')
            ->where('classes.class_id', '=', $idClass)
            ->first();
        $teacherSocmed = DB::table('teachers_socmed')
            ->where('teacher_id', '=', $teacherClass->teacher_id)
            ->first();
        $listStudents = DB::table('classes')
            ->join('classes_students', 'classes_students.class_id', '=', 'classes.class_id')
            ->where('classes.class_id', '=', $idClass)
            ->select('classes_students.student_id')
            ->get();
        
        return view("pages.students.index", compact('listStudents', 'teacherClass', 'teacherSocmed', 'classGrade', 'classTag', 'idClass'));
        // return view("pages.students.index");
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
