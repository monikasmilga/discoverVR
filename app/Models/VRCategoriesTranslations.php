<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VRCategoriesTranslations extends CoreModel
{
    protected $table = 'vr_categories_translations';

    protected $fillable = ['id', 'name', 'language_code', 'category_id'];
}
