<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VRResources extends CoreModel
{
    protected $table = 'vr_resources';

    protected $fillable = ['id', 'mime_type', 'path', 'width', 'size', 'height'];
}
