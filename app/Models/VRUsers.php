<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class VRUsers extends Authenticatable
{
    use Notifiable;

    public $incrementing = false;

    use SoftDeletes;

    protected $table = 'vr_users';

    protected $fillable = ['id', 'name', 'email', 'password', 'remember_token', 'phone'];

    public function roles(){
        return $this->belongsToMany(VRRoles::class, 'vr_connections_users_roles', 'user_id', 'role_id');
    }

    public function role(){
        return $this->hasOne(VRUsersRolesConnections::class, 'user_id', 'id');
    }

    protected $with = ['role'];

    protected $hidden =['password', 'remember_token'];
}
