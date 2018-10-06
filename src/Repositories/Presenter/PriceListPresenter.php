<?php

namespace Litecms\Pricelist\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class PriceListPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PriceListTransformer();
    }
}