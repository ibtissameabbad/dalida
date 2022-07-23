<?php

namespace App\Http\Domain\Setting;

use App\Models\Setting;

class SettingRepository
{
    /**
     * @param Setting $setting
     * @param $instagram
     * @return bool
     */
    public function update(Setting $setting, $instagram, $facebook, $youtube): bool
    {
        $setting->instagram = $instagram;
        $setting->facebook = $facebook;
        $setting->youtube = $youtube;
        return $setting->save();
    }
}
