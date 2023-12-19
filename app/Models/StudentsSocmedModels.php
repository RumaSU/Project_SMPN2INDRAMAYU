<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentsSocmedModels extends Model
{
    use HasFactory;
    protected $table = "students_socmed";
    protected $fillable = [
        'facebook', 'instagram', 'twitter', 'tiktok', 'youtube', 'student_id', 
    ];
}
