<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileStrOrgImageModels extends Model
{
    use HasFactory;

    protected $table="page_profile_structorg_image";
    protected $primaryKey="id_structorg_image";
    protected $fillable=["id_structorg_image", "imgleft", "imgright", "page_profile_id"];
}
