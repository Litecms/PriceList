<?php

namespace Litecms\PriceList\Facades;

use Illuminate\Support\Facades\Facade;

class PriceList extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'pricelist';
    }
}
