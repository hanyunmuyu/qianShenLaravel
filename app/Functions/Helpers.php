<?php

use Illuminate\Contracts\Routing\UrlGenerator;

if (!function_exists('admin_url')) {

    function admin_url($path = null, $parameters = [], $secure = null)
    {
        $path = '/admin/' . ltrim($path, '/');
        if (is_null($path)) {
            return app(UrlGenerator::class);
        }

        return app(UrlGenerator::class)->to($path, $parameters, $secure);
    }

}
