<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VRPages extends CoreModel
{
    protected $table = 'vr_pages';

    protected $fillable = ['id', 'category_id', 'cover_id'];

    public function translation ()
    {
        $lang = request('language_code');
        if($lang == null)
        {
            $lang = app()->getLocale();
        }

        return $this->hasOne(VRPagesTranslations::class, 'record_id', 'id')->where('language_code', $lang);
    }

    public function image(){

        return $this->hasOne(VRResources::class, 'id', 'cover_id');
    }

    protected $with = ['translation', 'image'];

}
