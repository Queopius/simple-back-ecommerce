<?php

if (! function_exists('formatDateAndTime')) {
    function formatDateAndTime($value, $format = 'd/m/Y - H:i a')
    {
        return Carbon\Carbon::parse($value)->format($format);
    }
}
