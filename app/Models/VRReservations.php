<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VRReservations extends CoreModel
{
    protected $table = 'vr_reservations';

    protected $fillable = ['id', 'experience_id', 'order_id', 'time'];
}
