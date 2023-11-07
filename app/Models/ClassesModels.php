<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassesModels extends Model
{
    use HasFactory;
    protected $table = "classes";
    protected $fillable = ['teacher_class', 'class', 'tag', 'description'];
    public function images()
    {
        return $this->hasMany(ClassesImages::class, 'class_id', 'id');
    }
}
