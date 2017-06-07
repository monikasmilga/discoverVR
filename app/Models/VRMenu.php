<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VRMenu extends CoreModel
{
    protected $table = 'vr_menu';

    protected $fillable = ['id', 'new_window', 'sequence', 'vr_parent_id'];
}
