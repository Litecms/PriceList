<?php

namespace Litecms\Pricelist;

use User;

class Pricelist
{
    /**
     * $price_list object.
     */
    protected $price_list;

    /**
     * Constructor.
     */
    public function __construct(\Litecms\Pricelist\Interfaces\PriceListRepositoryInterface $price_list)
    {
        $this->price_list = $price_list;
    }

    /**
     * Returns count of pricelist.
     *
     * @param array $filter
     *
     * @return int
     */
    public function count()
    {
        return  0;
    }

    /**
     * Make gadget View
     *
     * @param string $view
     *
     * @param int $count
     *
     * @return View
     */
    public function gadget($view = 'admin.price_list.gadget', $count = 10)
    {

        if (User::hasRole('user')) {
            $this->price_list->pushCriteria(new \Litepie\Litecms\Repositories\Criteria\PriceListUserCriteria());
        }

        $price_list = $this->price_list->scopeQuery(function ($query) use ($count) {
            return $query->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('pricelist::' . $view, compact('price_list'))->render();
    }
}
