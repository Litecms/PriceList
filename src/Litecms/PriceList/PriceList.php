<?php

namespace Litecms\PriceList;

class PriceList
{
    /**
     * $pricelist object.
     */
    protected $pricelist;

    /**
     * Constructor.
     */
    public function __construct(\Litecms\PriceList\Interfaces\PriceListRepositoryInterface $pricelist)
    {
        $this->pricelist = $pricelist;
    }

    /**
     * Returns count of pricelist.
     *
     * @param array $filter
     *
     * @return int
     */
    public function count($module = 'pricelist')
    {

        if ($module == 'pricelist') {
            return $this->pricelist
                ->scopeQuery(function ($query) {
                    return $query;
                })
                ->count();
        }

        return $this->pricelist
            ->pushCriteria(new \Litecms\PriceList\Repositories\Criteria\PriceListPublicCriteria())
            ->scopeQuery(function ($query) {
                return $query;
            })->count();
    }

}
