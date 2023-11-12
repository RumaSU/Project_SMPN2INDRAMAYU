<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachersModels extends Model
{
    use HasFactory;
    protected $table = "teachers";
    protected $primaryKey = "teacher_id";
    protected $fillable = ['nip', 'name', 'status', 'sector', 'email', 'no_telp', 'alamat'];
}
