<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachersSocmedModels extends Model
{
    use HasFactory;
    protected $table = "teachers_socmed";
    protected $fillable = [
        'facebook', 'instagram', 'twitter', 'tiktok', 'youtube', 'teacher_id', 
    ];
}
