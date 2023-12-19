<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentsImagesModels extends Model
{
    use HasFactory;
    protected $table = "students_images";
    protected $fillable = ['name_files', 'student_id'];
}
