<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileVisiMisiImageModels extends Model
{
    use HasFactory;
    protected $table="page_profile_misi_image";
    protected $primaryKey="id_misi_image";
    protected $fillable=["id_misi_image", "name_files", "page_profile_id"];
}
