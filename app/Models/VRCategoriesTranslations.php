<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VRCategoriesTranslations extends CoreModel
{
    protected $table = 'vr_categories_translations';

    protected $fillable = ['id', 'name', 'language_code', 'record_id'];

    public function translation()
    {
        $language = request('language_code');
        if ($language == null) {
            $language = app()->getLocale();
        }
        return $this->hasOne(VRCategoriesTranslations::class, 'record_id', 'id')->where('language_code', $language);
    }

    protected $with = ['translation'];
}
