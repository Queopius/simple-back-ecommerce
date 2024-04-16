<?php

namespace App\Helpers;

use Carbon\Carbon;

class Format
{
    public static function humanReadableSize(float $sizeInBytes): string
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB'];
        $power = $sizeInBytes > 0 ? floor(log($sizeInBytes, 1024)) : 0;

        return number_format($sizeInBytes / (1024 ** $power), 2, '.', ',') . ' ' . $units[$power];
    }

    public static function emoji(bool $bool): string
    {
        if ($bool) {
            return '✅';
        }

        return '❌';
    }

    public static function ageInDays(Carbon $date): string
    {
        return number_format(round($date->diffInMinutes() / (24 * 60), 2), 2).' ('.$date->diffForHumans().')';
    }
}
