<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VRMenuTranslations extends CoreModel
{
    protected $table = 'vr_menu_translations';

    protected $fillable = ['id', 'url', 'name', 'menu_id', 'language_code'];
}
