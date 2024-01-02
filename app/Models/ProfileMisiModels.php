<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileMisiModels extends Model
{
    use HasFactory;
    protected $table="page_profile_misi";
    protected $primaryKey="id_misi";
    protected $fillable=["id_misi", "misi", "page_profile_id"];
}
