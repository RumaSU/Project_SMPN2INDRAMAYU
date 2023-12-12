<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassesImagesModels extends Model
{
    use HasFactory;
    protected $table = "classes_images";
    protected $fillable = ['name_files', 'class_id'];

    public function class()
    {
        return $this->belongsTo(ClassesModels::class, 'class_id', 'class_id');
    }
}
