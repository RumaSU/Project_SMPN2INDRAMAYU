<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OsisMemberModels extends Model
{
    use HasFactory;
    protected $table="page_osis_member";
    protected $casts = [
        'student_id' => 'string',
    ];
    protected $fillable=["student_id", "role_osis",];
}
