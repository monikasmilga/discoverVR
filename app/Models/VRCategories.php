<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VRCategories extends CoreModel
{
    protected $table = 'vr_categories';

    protected $fillable = ['id'];

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
