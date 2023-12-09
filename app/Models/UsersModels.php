<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersModels extends Model
{
    use HasFactory;
    protected $table="users";
    protected $primaryKey="user_id";
    protected $fillable=["user_id", "username", "email", "password"];
    protected $hidden = ["password"];
    public function roles() {
        return $this->belongsToMany(UsersRolesModels::class, 'roles');
    }
}
