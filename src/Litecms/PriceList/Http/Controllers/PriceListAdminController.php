<?php

namespace Litecms\PriceList\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Form;
use Litecms\PriceList\Http\Requests\PriceListAdminRequest;
use Litecms\PriceList\Interfaces\PriceListRepositoryInterface;
use Litecms\PriceList\Models\PriceList;

/**
 * Admin web controller class.
 */
class PriceListAdminController extends BaseController
{
    /**
     * The authentication guard that should be used.
     *
     * @var string
     */
    public $guard = 'admin.web';

    /**
     * The home page route of admin.
     *
     * @var string
     */
    public $home = 'admin';

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
        $this->middleware('web');
        $this->middleware('auth:admin.web');
        $this->setupTheme(config('theme.themes.admin.theme'), config('theme.themes.admin.layout'));
        parent::__construct();
    }

    /**
     * Display a list of pricelist.
     *
     * @return Response
     */
    public function index(PriceListAdminRequest $request)
    {
        $pageLimit = $request->input('pageLimit');
        if ($request->wantsJson()) {
            $pricelists  = $this->repository
                ->setPresenter('\\Litecms\\PriceList\\Repositories\\Presenter\\PriceListListPresenter')
                ->scopeQuery(function ($query) {
                    return $query->orderBy('title', 'ASC');
                })->paginate($pageLimit);

            $pricelists['recordsTotal']    = $pricelists['meta']['pagination']['total'];
            $pricelists['recordsFiltered'] = $pricelists['meta']['pagination']['total'];
            $pricelists['request']         = $request->all();
            return response()->json($pricelists, 200);

        }

        $this   ->theme->prependTitle(trans('pricelist::pricelist.names').' :: ');
        return $this->theme->of('pricelist::admin.pricelist.index')->render();
    }

    /**
     * Display pricelist.
     *
     * @param Request $request
     * @param Model   $pricelist
     *
     * @return Response
     */
    public function show(PriceListAdminRequest $request, PriceList $pricelist)
    {
        if (!$pricelist->exists) {
            return response()->view('pricelist::admin.pricelist.new', compact('pricelist'));
        }

        Form::populate($pricelist);
        return response()->view('pricelist::admin.pricelist.show', compact('pricelist'));
    }

    /**
     * Show the form for creating a new pricelist.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(PriceListAdminRequest $request)
    {

        $pricelist = $this->repository->newInstance([]);

        Form::populate($pricelist);

        return response()->view('pricelist::admin.pricelist.create', compact('pricelist'));

    }

    /**
     * Create new pricelist.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(PriceListAdminRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.web');
            $pricelist          = $this->repository->create($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('pricelist::pricelist.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/pricelist/pricelist/'.$pricelist->getRouteKey())
            ], 201);


        } catch (Exception $e) {
            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
            ], 400);
        }
    }

    /**
     * Show pricelist for editing.
     *
     * @param Request $request
     * @param Model   $pricelist
     *
     * @return Response
     */
    public function edit(PriceListAdminRequest $request, PriceList $pricelist)
    {
        Form::populate($pricelist);
        return  response()->view('pricelist::admin.pricelist.edit', compact('pricelist'));
    }

    /**
     * Update the pricelist.
     *
     * @param Request $request
     * @param Model   $pricelist
     *
     * @return Response
     */
    public function update(PriceListAdminRequest $request, PriceList $pricelist)
    {
        try {

            $attributes = $request->all();

            $pricelist->update($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('pricelist::pricelist.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/pricelist/pricelist/'.$pricelist->getRouteKey())
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/pricelist/pricelist/'.$pricelist->getRouteKey()),
            ], 400);

        }
    }

    /**
     * Remove the pricelist.
     *
     * @param Model   $pricelist
     *
     * @return Response
     */
    public function destroy(PriceListAdminRequest $request, PriceList $pricelist)
    {

        try {

            $t = $pricelist->delete();

            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('pricelist::pricelist.name')]),
                'code'     => 202,
                'redirect' => trans_url('/admin/pricelist/pricelist/0'),
            ], 202);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/pricelist/pricelist/'.$pricelist->getRouteKey()),
            ], 400);
        }
    }
}
