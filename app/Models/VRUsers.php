<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VRUsers extends CoreModel
{
    protected $table = 'vr_users';

    protected $fillable = ['id', 'name', 'email', 'password', 'remember_token', 'phone'];
}
