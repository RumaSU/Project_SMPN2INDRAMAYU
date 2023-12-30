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
    public function deleteInfo() {
        return view('pages.classes.load');
    }
    public function alertInfo() {
        return view('pages.classes.alert');
    }
    
    public function studentForm() {
        return view('pages.students.load');
    }
}
