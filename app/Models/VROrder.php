<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VROrder extends CoreModel
{
    protected $table = 'vr_order';

    protected $fillable = ['id', 'status', 'user_id'];
}
