<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VRPages extends CoreModel
{
    protected $table = 'vr_pages';

    protected $fillable = ['id', 'category_id', 'cover_id'];
}
