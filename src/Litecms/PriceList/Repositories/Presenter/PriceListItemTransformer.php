<?php

namespace Litecms\PriceList\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class PriceListItemTransformer extends TransformerAbstract
{
    public function transform(\Litecms\PriceList\Models\PriceList $pricelist)
    {
        return [
            'id'                => $pricelist->getRouteKey(),
            'title'             => $pricelist->title,
            'sub_title'         => $pricelist->sub_title,
            'features'          => $pricelist->features,
            'price'             => $pricelist->price,
            'type'              => $pricelist->type,
            'image'             => $pricelist->image,
        ];
    }
}