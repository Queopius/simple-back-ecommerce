<?php

use Illuminate\Support\Facades\Auth;

if (! function_exists('current_user')) {
    function current_user()
    {
        if (Auth::guard('web')->check()) {
            return Auth::guard('web')->user();
        }

        return auth()->user();
    }
}
