<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VRLanguageCodes extends Model
{
    protected $table = 'vr_language_codes';

    protected $fillable = ['id', 'language_code', 'name', 'is_active'];

    public $timestamps = false;

    public $incrementing = false;
}
