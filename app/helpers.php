<?php

use Illuminate\Support\Facades\Route;

if (! function_exists('isCurrentRouteIn')) {
    function isCurrentRouteIn(array $routes)
    {
        return in_array(Route::currentRouteName(), $routes);
    }
}
