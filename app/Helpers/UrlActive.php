<?php

if (! function_exists('setActiveRoute'))
{
    function setActiveRoute($name)
    {
        return request()->routeIs($name) ? 'active' : '';
    }
}
