<?php

use App\Models\VRLanguageCodes;

function getActiveLanguages()
{
    return VRLanguageCodes::where('is_active', '=', '1')->pluck('name', 'id');
}