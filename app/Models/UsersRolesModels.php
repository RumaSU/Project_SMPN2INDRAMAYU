<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersRolesModels extends Model
{
    use HasFactory;
    protected $table="users_roles";
    protected $fillable=["user_id", "roles"];
    public function user() {
        return $this -> belongsToMany(UsersModels::class, 'user_id');
    }
}
