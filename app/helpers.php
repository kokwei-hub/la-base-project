<?php

use Illuminate\Support\Facades\{Log, Route};

if (! function_exists('cdn')) {
    function cdn(string $asset, string $key = '')
    {
        if (! config('app.cdn')) {
            return asset($asset);
        }
        
        if (strlen($key) === 0) {
            return asset($asset);
        }

        return config('app.cdn')[$key] . $asset;
    }
}

if (! function_exists('api_token')) {
    function api_token()
    {
        return session()->get('api_token');
    }
}