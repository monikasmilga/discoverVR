<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VRUsersRolesConnections extends Model
{
    protected $table = 'vr_connections_users_roles';

    protected $fillable = ['user_id', 'role_id'];

    public $updated_at = false;
}
