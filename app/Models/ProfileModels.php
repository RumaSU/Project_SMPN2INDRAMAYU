<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileModels extends Model
{
    use HasFactory;
    protected $table="page_profile";
    protected $casts = [
        'page_profile_id' => 'string',
    ];
    protected $primaryKey="page_profile_id";
    protected $fillable=["page_profile_id", "visi"];
}
