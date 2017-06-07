<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VRRolesPermissionsConnections extends CoreModel
{
    protected $table = 'vr_connections_roles_permissions';

    protected $fillable = ['role_id', 'permission_id'];
}
