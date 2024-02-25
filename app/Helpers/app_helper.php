<?php

if (!function_exists('user')) {
    function user() {
        if (auth()->user()) {
            return auth()->user();
        } else {
            foreach (array_keys(config('auth.guards')) as $guard) {
                if (auth($guard)->user()) {
                    $user = auth($guard)->user();
                    $user->guard = $guard;
                    return $user;
                }

                continue;
            }
        }
    }
}