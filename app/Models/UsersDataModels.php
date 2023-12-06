<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersDataModels extends Model
{
    use HasFactory;
    protected $table="users_data";
    protected $guarded=["user_id"];
    protected $fillable=[
        "nis_nip", "nama", "no_telepon"
    ];

}
