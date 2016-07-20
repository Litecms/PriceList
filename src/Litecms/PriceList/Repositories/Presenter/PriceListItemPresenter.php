<?php

namespace Litecms\PriceList\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class PriceListItemPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PriceListItemTransformer();
    }
}