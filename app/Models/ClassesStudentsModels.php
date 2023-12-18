<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassesStudentsModels extends Model
{
    use HasFactory;
    protected $table = "classes_students";
    protected $fillable = ['class_id', 'student_id'];
}
