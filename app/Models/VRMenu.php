<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VRMenu extends CoreModel
{
    protected $table = 'vr_menu';

    protected $fillable = ['id', 'new_window', 'sequence', 'vr_parent_id'];

    public function translation()
    {

        return $this->hasOne(VRMenuTranslations::class, 'record_id', 'id')->where('language_code', app()->getLocale());
    }

    protected $with = ['translation'];
}
