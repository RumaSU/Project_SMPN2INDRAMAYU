<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OsisTeguideModels extends Model
{
    use HasFactory;
    protected $table="page_osis_teguide";
    protected $casts = [
        'page_osis_id' => 'string',
    ];
    protected $fillable=["page_osis_id", "teacher_id", "quote"];
}
