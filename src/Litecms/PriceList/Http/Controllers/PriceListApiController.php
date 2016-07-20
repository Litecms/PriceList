<?php

namespace Litecms\PriceList\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Litecms\PriceList\Interfaces\PriceListRepositoryInterface;
use Litecms\PriceList\Repositories\Presenter\PriceListItemTransformer;

/**
 * Pubic API controller class.
 */
class PriceListApiController extends BaseController
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
        $this->middleware('api');
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
        $pricelists = $this->repository
            ->setPresenter('\\Litecms\\PriceList\\Repositories\\Presenter\\PriceListListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->paginate();

        $pricelists['code'] = 2000;
        return response()->json($pricelists)
                ->setStatusCode(200, 'INDEX_SUCCESS');
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
        $pricelist = $this->repository
            ->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        if (!is_null($pricelist)) {
            $pricelist         = $this->itemPresenter($module, new PriceListItemTransformer);
            $pricelist['code'] = 2001;
            return response()->json($pricelist)
                ->setStatusCode(200, 'SHOW_SUCCESS');
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }
}
