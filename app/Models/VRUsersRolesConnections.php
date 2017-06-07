<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VRUsersRolesConnections extends CoreModel
{
    protected $table = 'vr_connections_users_roles';

    protected $fillable = ['user_id', 'role_id'];
}
