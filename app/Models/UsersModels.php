<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Contracts\Auth\Authenticatable;
// use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;
// use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;


class UsersModels extends Model implements AuthenticatableContract
{
    use HasApiTokens, HasFactory, Notifiable, AuthenticatableTrait;
    protected $table="users";
    protected $primaryKey="user_id";
    protected $casts = [
        'user_id' => 'string',
    ];
    protected $guarded = ['users_id'];
    protected $guard = 'web';
    protected $fillable=["user_id", "username", "email", "password"];
    protected $hidden = ["password"];
    public function roles() {
        return $this->belongsToMany(
            UsersRolesModels::class, 
            'users',
            'user_id', 
            'user_id',
            'user_id',
            'user_id',
            'users'
            )
            ->select('users_roles.roles');
    }
}
