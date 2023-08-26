<?php

namespace Uzsoftic\LaravelEskiz\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelEskiz extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-eskiz';
    }
}
