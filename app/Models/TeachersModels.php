<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachersModels extends Model
{
    use HasFactory;
    protected $table = "teachers";
    protected $casts = [
        'teacher_id' => 'string',
    ];
    protected $primaryKey = "teacher_id";
    protected $fillable = [
        'teacher_id', 'nip', 'name', 'type','sector', 'email', 'years_sign', 'status',
    ];
}
