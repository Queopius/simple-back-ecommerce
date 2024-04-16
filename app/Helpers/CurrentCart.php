<?php

if (! function_exists('current_cart')) {
    function current_cart()
    {
        return auth()->user();
    }
}
