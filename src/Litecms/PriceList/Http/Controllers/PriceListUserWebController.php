<?php

namespace Litecms\PriceList\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Form;
use Litecms\PriceList\Http\Requests\PriceListUserRequest;
use Litecms\PriceList\Interfaces\PriceListRepositoryInterface;
use Litecms\PriceList\Models\PriceList;

class PriceListUserController extends BaseController
{

    /**
     * The authentication guard that should be used.
     *
     * @var string
     */
    protected $guard = 'web';

    /**
     * The home page route of user.
     *
     * @var string
     */
    protected $home = 'home';

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
        $this->middleware('auth:web');
        $this->middleware('auth.active:web');
        $this->setupTheme(config('theme.themes.user.theme'), config('theme.themes.user.layout'));
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(PriceListUserRequest $request)
    {
        $this->repository->pushCriteria(new \Lavalite\PriceList\Repositories\Criteria\PriceListUserCriteria());
        $pricelists = $this->repository->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        $this->theme->prependTitle(trans('pricelist::pricelist.names').' :: ');

        return $this->theme->of('pricelist::user.pricelist.index', compact('pricelists'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param PriceList $pricelist
     *
     * @return Response
     */
    public function show(PriceListUserRequest $request, PriceList $pricelist)
    {
        Form::populate($pricelist);

        return $this->theme->of('pricelist::user.pricelist.show', compact('pricelist'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(PriceListUserRequest $request)
    {

        $pricelist = $this->repository->newInstance([]);
        Form::populate($pricelist);

        return $this->theme->of('pricelist::user.pricelist.create', compact('pricelist'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(PriceListUserRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $pricelist = $this->repository->create($attributes);

            return redirect(trans_url('/user/pricelist/pricelist'))
                -> with('message', trans('messages.success.created', ['Module' => trans('pricelist::pricelist.name')]))
                -> with('code', 201);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param PriceList $pricelist
     *
     * @return Response
     */
    public function edit(PriceListUserRequest $request, PriceList $pricelist)
    {

        Form::populate($pricelist);

        return $this->theme->of('pricelist::user.pricelist.edit', compact('pricelist'))->render();
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param PriceList $pricelist
     *
     * @return Response
     */
    public function update(PriceListUserRequest $request, PriceList $pricelist)
    {
        try {
            $this->repository->update($request->all(), $pricelist->getRouteKey());

            return redirect(trans_url('/user/pricelist/pricelist'))
                ->with('message', trans('messages.success.updated', ['Module' => trans('pricelist::pricelist.name')]))
                ->with('code', 204);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Remove the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy(PriceListUserRequest $request, PriceList $pricelist)
    {
        try {
            $this->repository->delete($pricelist->getRouteKey());
            return redirect(trans_url('/user/pricelist/pricelist'))
                ->with('message', trans('messages.success.deleted', ['Module' => trans('pricelist::pricelist.name')]))
                ->with('code', 204);

        } catch (Exception $e) {

            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);

        }
    }
}
