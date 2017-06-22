<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VRPagesTranslations extends CoreModel
{
    protected $table = 'vr_pages_translations';

    protected $fillable = ['id', 'record_id', 'language_code', 'title', 'description_short', 'description_long', 'slug'];


    public function page()
    {

        return $this->hasOne(VRPages::class, 'id', 'record_id');
    }
}