<?php

/**
 * @param string $guard
 *
 * @return string|null
 */
function getModelForGuard(string $guard)
{
    return collect(config('auth.guards'))
        ->map(function ($guard) {
            return config("auth.providers.{$guard['provider']}.model");
        })->get($guard);
}

function isNotLumen() : bool
{
    return ! preg_match('/lumen/i', app()->version());
}

function isValidUuid( $uuid ) {
    
    if (!is_string($uuid) || (preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/', $uuid) !== 1)) {
        return false;
    }
    return true;
}