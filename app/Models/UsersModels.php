<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersModels extends Model
{
    use HasFactory;
    protected $table="users";
    protected $guarded=["user_id"];
    protected $primaryKey="user_id";
    protected $fillable=[
        "username", "email", "password"
    ];
    

}
