<?php

use App\Models\VRLanguageCodes;
use App\Models\VRMenu;

function getActiveLanguages()
{
    $languages = VRLanguageCodes::where('is_active', '=', '1')->pluck('name', 'id')->toArray();
    $locale = app()->getLocale();

    if (!isset($languages[$locale])) {
        $locale = config('app.fallback_locale');

        if (!isset($languages[$locale])) {
            return $languages;
        }
    }

    $languages = [$locale => $languages[$locale]] + $languages;

    return $languages;
}

function getFrontEndMenu()
{
    $data = VRMenu::where('vr_parent_id', '=', null)->get()->toArray();
//dd($data);
    return [$data];
}