<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class VRUsers extends Authenticatable
{
    use Notifiable;

    protected $table = 'vr_users';

    protected $fillable = ['id', 'name', 'email', 'password', 'remember_token', 'phone'];
}
