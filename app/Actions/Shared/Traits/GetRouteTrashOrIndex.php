<?php

namespace App\Actions\Shared\Traits;

/**
 * [Description GetRouteTrashOrIndex]
 */
trait GetRouteTrashOrIndex
{
    /**
     * @param mixed $route
     *
     * @return [type]
     */
    public function isRouteTrashOrIndex($route)
    {
        return request()->routeIs($route) ? 'trash' : 'index';
    }
}
