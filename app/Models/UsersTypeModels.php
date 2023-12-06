<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersTypeModels extends Model
{
    use HasFactory;
    protected $table="users_type";
    protected $fillable=["user_id", "type"];

}
