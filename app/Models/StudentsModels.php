<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentsModels extends Model
{
    use HasFactory;
    protected $table = "students";
    protected $casts = [
        'student_id' => 'string',
    ];
    protected $primaryKey = "student_id";
    protected $fillable = ['student_id','nis', 'name', 'status', 'is_published', 'year'];
}
