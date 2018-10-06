<?php

namespace Litecms\Pricelist\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class PriceListTransformer extends TransformerAbstract
{
    public function transform(\Litecms\Pricelist\Models\PriceList $price_list)
    {
        return [
            'id'                => $price_list->getRouteKey(),
            'title'             => $price_list->title,
            'sub_title'         => $price_list->sub_title,
            'features'          => $price_list->features,
            'price'             => $price_list->price,
            'type'              => $price_list->type,
            'image'             => $price_list->image,
            'slug'              => $price_list->slug,
            'status'            => $price_list->status,
            'user_id'           => $price_list->user_id,
            'user_type'         => $price_list->user_type,
            'upload_folder'     => $price_list->upload_folder,
            'deleted_at'        => $price_list->deleted_at,
            'created_at'        => $price_list->created_at,
            'updated_at'        => $price_list->updated_at,
            'url'              => [
                'public' => trans_url('pricelist/'.$price_list->getPublicKey()),
                'user'   => guard_url('pricelist/price_list/'.$price_list->getRouteKey()),
            ], 
            'status'            => trans($price_list->status),
            'created_at'        => format_date($price_list->created_at),
            'updated_at'        => format_date($price_list->updated_at),
        ];
    }
}