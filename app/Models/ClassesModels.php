<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassesModels extends Model
{
    use HasFactory;
    protected $table = "classes";
    protected $primaryKey = "class_id";
    protected $fillable = ['teacher_id', 'class_grade', 'class_tag', 'description', 'status', 'is_published', 'year'];
    public function images()
    {
        return $this->hasMany(ClassesImages::class, 'class_id', 'class_id');
    }
}
