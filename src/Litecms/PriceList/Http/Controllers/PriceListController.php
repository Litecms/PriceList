<?php

namespace Litecms\PriceList\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Litecms\PriceList\Interfaces\PriceListRepositoryInterface;

class PriceListController extends BaseController
{
    /**
     * Constructor.
     *
     * @param type \Litecms\PriceList\Interfaces\PriceListRepositoryInterface $pricelist
     *
     * @return type
     */
    public function __construct(PriceListRepositoryInterface $pricelist)
    {
        $this->repository = $pricelist;
        $this->middleware('web');
        $this->setupTheme(config('theme.themes.public.theme'), config('theme.themes.public.layout'));
        parent::__construct();
    }

    /**
     * Show pricelist's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $pricelists = $this->repository->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        return $this->theme->of('pricelist::public.pricelist.index', compact('pricelists'))->render();
    }

    /**
     * Show pricelist.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $pricelist = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        return $this->theme->of('pricelist::public.pricelist.show', compact('pricelist'))->render();
    }
}
