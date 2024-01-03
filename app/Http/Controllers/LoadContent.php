<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Date;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Uuid;

class LoadContent extends Controller
{
    public function classInfo() {
        return view('pages.classes.load');
    }
    public function deleteClassInfo() {
        return view('pages.classes.load');
    }
    public function alertClassInfo() {
        return view('pages.classes.alert');
    }
    
    public function studentForm() {
        return view('pages.students.load');
    }
    public function studentDelete() {
        return view('pages.students.load');
    }
    public function alertStudentInfo() {
        return view('pages.students.alert');
    }
    public function profileViMiForm() {
        return view('pages.profile.form');
    }
    
    public function osisTeGuidForm() {
        return view('pages.osis.form');
    }
}
