<?php

namespace Litecms\Pricelist\Facades;

use Illuminate\Support\Facades\Facade;

class Pricelist extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'litecms.pricelist';
    }
}
