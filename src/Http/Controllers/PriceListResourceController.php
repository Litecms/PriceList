<?php

namespace Litecms\Pricelist\Http\Controllers;

use App\Http\Controllers\ResourceController as BaseController;
use Form;
use Litecms\Pricelist\Http\Requests\PriceListRequest;
use Litecms\Pricelist\Interfaces\PriceListRepositoryInterface;
use Litecms\Pricelist\Models\PriceList;

/**
 * Resource controller class for price_list.
 */
class PriceListResourceController extends BaseController
{

    /**
     * Initialize price_list resource controller.
     *
     * @param type PriceListRepositoryInterface $price_list
     *
     * @return null
     */
    public function __construct(PriceListRepositoryInterface $price_list)
    {
        parent::__construct();
        $this->repository = $price_list;
        $this->repository
            ->pushCriteria(\Litepie\Repository\Criteria\RequestCriteria::class)
            ->pushCriteria(\Litecms\Pricelist\Repositories\Criteria\PriceListResourceCriteria::class);
    }

    /**
     * Display a list of price_list.
     *
     * @return Response
     */
    public function index(PriceListRequest $request)
    {
        $view = $this->response->theme->listView();

        if ($this->response->typeIs('json')) {
            $function = camel_case('get-' . $view);
            return $this->repository
                ->setPresenter(\Litecms\Pricelist\Repositories\Presenter\PriceListPresenter::class)
                ->$function();
        }

        $price_lists = $this->repository->paginate();

        return $this->response->setMetaTitle(trans('pricelist::price_list.names'))
            ->view('pricelist::price_list.index', true)
            ->data(compact('price_lists'))
            ->output();
    }

    /**
     * Display price_list.
     *
     * @param Request $request
     * @param Model   $price_list
     *
     * @return Response
     */
    public function show(PriceListRequest $request, PriceList $price_list)
    {

        if ($price_list->exists) {
            $view = 'pricelist::price_list.show';
        } else {
            $view = 'pricelist::price_list.new';
        }

        return $this->response->setMetaTitle(trans('app.view') . ' ' . trans('pricelist::price_list.name'))
            ->data(compact('price_list'))
            ->view($view, true)
            ->output();
    }

    /**
     * Show the form for creating a new price_list.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(PriceListRequest $request)
    {

        $price_list = $this->repository->newInstance([]);
        return $this->response->setMetaTitle(trans('app.new') . ' ' . trans('pricelist::price_list.name')) 
            ->view('pricelist::price_list.create', true) 
            ->data(compact('price_list'))
            ->output();
    }

    /**
     * Create new price_list.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(PriceListRequest $request)
    {
        try {
            $attributes              = $request->all();
            $attributes['user_id']   = user_id();
            $attributes['user_type'] = user_type();
            $price_list                 = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('pricelist::price_list.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('pricelist/price_list/' . $price_list->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('/pricelist/price_list'))
                ->redirect();
        }

    }

    /**
     * Show price_list for editing.
     *
     * @param Request $request
     * @param Model   $price_list
     *
     * @return Response
     */
    public function edit(PriceListRequest $request, PriceList $price_list)
    {
        return $this->response->setMetaTitle(trans('app.edit') . ' ' . trans('pricelist::price_list.name'))
            ->view('pricelist::price_list.edit', true)
            ->data(compact('price_list'))
            ->output();
    }

    /**
     * Update the price_list.
     *
     * @param Request $request
     * @param Model   $price_list
     *
     * @return Response
     */
    public function update(PriceListRequest $request, PriceList $price_list)
    {
        try {
            $attributes = $request->all();

            $price_list->update($attributes);
            return $this->response->message(trans('messages.success.updated', ['Module' => trans('pricelist::price_list.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('pricelist/price_list/' . $price_list->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('pricelist/price_list/' . $price_list->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove the price_list.
     *
     * @param Model   $price_list
     *
     * @return Response
     */
    public function destroy(PriceListRequest $request, PriceList $price_list)
    {
        try {

            $price_list->delete();
            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('pricelist::price_list.name')]))
                ->code(202)
                ->status('success')
                ->url(guard_url('pricelist/price_list/0'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('pricelist/price_list/' . $price_list->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove multiple price_list.
     *
     * @param Model   $price_list
     *
     * @return Response
     */
    public function delete(PriceListRequest $request, $type)
    {
        try {
            $ids = hashids_decode($request->input('ids'));

            if ($type == 'purge') {
                $this->repository->purge($ids);
            } else {
                $this->repository->delete($ids);
            }

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('pricelist::price_list.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('pricelist/price_list'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/pricelist/price_list'))
                ->redirect();
        }

    }

    /**
     * Restore deleted price_lists.
     *
     * @param Model   $price_list
     *
     * @return Response
     */
    public function restore(PriceListRequest $request)
    {
        try {
            $ids = hashids_decode($request->input('ids'));
            $this->repository->restore($ids);

            return $this->response->message(trans('messages.success.restore', ['Module' => trans('pricelist::price_list.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('/pricelist/price_list'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/pricelist/price_list/'))
                ->redirect();
        }

    }

}
