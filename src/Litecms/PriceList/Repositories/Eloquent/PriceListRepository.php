<?php

namespace Litecms\PriceList\Repositories\Eloquent;

use Litecms\PriceList\Interfaces\PriceListRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class PriceListRepository extends BaseRepository implements PriceListRepositoryInterface
{
    /**
     * Booting the repository.
     *
     * @return null
     */
    public function boot()
    {
        $this->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'));
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        $this->fieldSearchable = config('package.pricelist.pricelist.search');
        return config('package.pricelist.pricelist.model');
    }
}
