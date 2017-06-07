<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VRPermissions extends CoreModel
{
    protected $table = 'vr_permissions';

    protected $fillable = ['id', 'name', 'comment'];
}
