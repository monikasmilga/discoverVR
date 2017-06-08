<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class VRUsers extends Authenticatable
{
    use Notifiable;

    public $incrementing = false;

    protected $table = 'vr_users';

    protected $fillable = ['id', 'name', 'email', 'password', 'remember_token', 'phone'];

    public function roles(){
        return $this->belongsToMany(VRRoles::class, 'vr_connections_users_roles', 'user_id', 'role_id');
    }
}
