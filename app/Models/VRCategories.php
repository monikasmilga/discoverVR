<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VRCategories extends CoreModel
{
    protected $table = 'vr_categories';

    protected $fillable = ['id'];

    public function translation()
    {

        return $this->hasOne(VRCategoriesTranslations::class, 'record_id', 'id')->where('language_code', app()->getLocale());
    }

    protected $with = ['translation'];

}
