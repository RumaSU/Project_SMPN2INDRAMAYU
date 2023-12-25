<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassesModels extends Model
{
    use HasFactory;
    protected $table = "classes";
    protected $primaryKey = "class_id";
    protected $casts = [
        'class_id' => 'string',
    ];
    protected $fillable = ['class_id', 'teacher_id', 'class_grade', 'class_tag', 'description', 'status', 'is_published', 'year'];
    // public function images()
    // {
    //     return $this->hasMany(ClassesImagesModels::class, 'class_id', 'class_id');
    // }
}
