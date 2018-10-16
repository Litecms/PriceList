<?php

namespace Litecms\Pricelist\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Litecms\Pricelist\Interfaces\PriceListRepositoryInterface;

class PriceListPublicController extends BaseController
{
    // use PriceListWorkflow;

    /**
     * Constructor.
     *
     * @param type \Litecms\PriceList\Interfaces\PriceListRepositoryInterface $price_list
     *
     * @return type
     */
    public function __construct(PriceListRepositoryInterface $price_list)
    {
        $this->repository = $price_list;
        parent::__construct();
    }

    /**
     * Show price_list's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $price_lists = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();


        return $this->response->setMetaTitle(trans('pricelist::price_list.names'))
            ->view('pricelist::price_list.index')
            ->data(compact('price_lists'))
            ->output();
    }

    /**
     * Show price_list's list based on a type.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function list($type = null)
    {
        $price_lists = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();


        return $this->response->setMetaTitle(trans('pricelist::price_list.names'))
            ->view('pricelist::price_list.index')
            ->data(compact('price_lists'))
            ->output();
    }

    /**
     * Show price_list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $price_list = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        return $this->response->setMetaTitle($price_list->name . trans('pricelist::price_list.name'))
            ->view('pricelist::price_list.show')
            ->data(compact('price_list'))
            ->output();
    }

}
