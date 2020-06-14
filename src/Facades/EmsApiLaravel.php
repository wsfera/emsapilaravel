<?php

namespace Wsfera\EmsApiLaravel\Facades;

use Illuminate\Support\Facades\Facade;

class EmsApiLaravel extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'emsapilaravel';
    }
}
