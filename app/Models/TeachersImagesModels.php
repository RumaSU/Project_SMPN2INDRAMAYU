<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachersImagesModels extends Model
{
    use HasFactory;
    protected $table = "teachers_images";
    protected $fillable = [
        'name_files', 'teacher_id',
    ];
}
