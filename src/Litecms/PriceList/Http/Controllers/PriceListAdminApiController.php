<?php

namespace Litecms\PriceList\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Litecms\PriceList\Http\Requests\PriceListAdminApiRequest;
use Litecms\PriceList\Interfaces\PriceListRepositoryInterface;
use Litecms\PriceList\Models\PriceList;

/**
 * Admin API controller class.
 */
class PriceListAdminApiController extends BaseController
{
    /**
     * The authentication guard that should be used.
     *
     * @var string
     */
    protected $guard = 'admin.api';
    /**
     * Initialize pricelist controller.
     *
     * @param type PriceListRepositoryInterface $pricelist
     *
     * @return type
     */
    public function __construct(PriceListRepositoryInterface $pricelist)
    {
        $this->repository = $pricelist;
        $this->middleware('api');
        $this->middleware('jwt.auth:admin.api');
        $this->setupTheme(config('theme.themes.admin.theme'), config('theme.themes.admin.layout'));
        parent::__construct();
    }

    /**
     * Display a list of pricelist.
     *
     * @return json
     */
    public function index(PriceListAdminApiRequest $request)
    {
        $pricelists  = $this->repository
            ->setPresenter('\\Litecms\\PriceList\\Repositories\\Presenter\\PriceListListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->all();
        $pricelists['code'] = 2000;
        return response()->json($pricelists) 
                         ->setStatusCode(200, 'INDEX_SUCCESS');

    }

    /**
     * Display pricelist.
     *
     * @param Request $request
     * @param Model   PriceList
     *
     * @return Json
     */
    public function show(PriceListAdminApiRequest $request, PriceList $pricelist)
    {
        $pricelist         = $pricelist->presenter();
        $pricelist['code'] = 2001;
        return response()->json($pricelist)
                         ->setStatusCode(200, 'SHOW_SUCCESS');;

    }

    /**
     * Show the form for creating a new pricelist.
     *
     * @param Request $request
     *
     * @return json
     */
    public function create(PriceListAdminApiRequest $request, PriceList $pricelist)
    {
        $pricelist         = $pricelist->presenter();
        $pricelist['code'] = 2002;
        return response()->json($pricelist)
                         ->setStatusCode(200, 'CREATE_SUCCESS');

    }

    /**
     * Create new pricelist.
     *
     * @param Request $request
     *
     * @return json
     */
    public function store(PriceListAdminApiRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.api');
            $pricelist          = $this->repository->create($attributes);
            $pricelist          = $pricelist->presenter();
            $pricelist['code']  = 2004;

            return response()->json($pricelist)
                             ->setStatusCode(201, 'STORE_SUCCESS');
        } catch (Exception $e) {
            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4004,
            ])->setStatusCode(400, 'STORE_ERROR');
;
        }
    }

    /**
     * Show pricelist for editing.
     *
     * @param Request $request
     * @param Model   $pricelist
     *
     * @return json
     */
    public function edit(PriceListAdminApiRequest $request, PriceList $pricelist)
    {
        $pricelist         = $pricelist->presenter();
        $pricelist['code'] = 2003;
        return response()-> json($pricelist)
                        ->setStatusCode(200, 'EDIT_SUCCESS');;
    }

    /**
     * Update the pricelist.
     *
     * @param Request $request
     * @param Model   $pricelist
     *
     * @return json
     */
    public function update(PriceListAdminApiRequest $request, PriceList $pricelist)
    {
        try {

            $attributes = $request->all();

            $pricelist->update($attributes);
            $pricelist         = $pricelist->presenter();
            $pricelist['code'] = 2005;

            return response()->json($pricelist)
                             ->setStatusCode(201, 'UPDATE_SUCCESS');


        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4005,
            ])->setStatusCode(400, 'UPDATE_ERROR');

        }
    }

    /**
     * Remove the pricelist.
     *
     * @param Request $request
     * @param Model   $pricelist
     *
     * @return json
     */
    public function destroy(PriceListAdminApiRequest $request, PriceList $pricelist)
    {

        try {

            $t = $pricelist->delete();

            return response()->json([
                'message'  => trans('messages.success.delete', ['Module' => trans('pricelist::pricelist.name')]),
                'code'     => 2006
            ])->setStatusCode(202, 'DESTROY_SUCCESS');

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4006,
            ])->setStatusCode(400, 'DESTROY_ERROR');
        }
    }
}
