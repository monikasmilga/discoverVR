<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VRPagesResourcesConnections extends CoreModel
{
    protected $table = 'vr_connections_pages_resources';

    protected $fillable = ['resource_id', 'page_id'];
}
