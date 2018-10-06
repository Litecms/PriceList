<?php

namespace Litecms\Pricelist\Repositories\Eloquent;

use Litecms\Pricelist\Interfaces\PriceListRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class PriceListRepository extends BaseRepository implements PriceListRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('litecms.pricelist.price_list.model.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('litecms.pricelist.price_list.model.model');
    }
}
