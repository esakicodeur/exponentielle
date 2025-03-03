<?php

if (! function_exists('set_active_route')) {
    function set_active_route($route) {
        return Route::is($route) ? 'active' : '';
    }
}

if (! function_exists('set_active_category')) {
    function set_active_category($route) {
        return Route::is($route) ? 'bg-black text-white py-1 px-4 rounded-sm' : '';
    }
}
