<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VRRoles extends CoreModel
{
    protected $table = 'vr_roles';

    protected $fillable = ['id', 'name', 'comment'];
}
