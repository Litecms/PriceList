<?php

return [

    /**
     * Provider.
     */
    'provider'  => 'litecms',

    /*
     * Package.
     */
    'package'   => 'pricelist',

    /*
     * Modules.
     */
    'modules'   => ['pricelist'],

    'pricelist' => [
        'model'         => 'Litecms\PriceList\Models\PriceList',
        'table'         => 'price_lists',
        'presenter'     => \Litecms\PriceList\Repositories\Presenter\PriceListItemPresenter::class,
        'hidden'        => [],
        'visible'       => [],
        'guarded'       => ['*'],
        'slugs'         => ['slug' => 'name'],
        'dates'         => ['deleted_at'],
        'appends'       => [],
        'fillable'      => ['user_id', 'title', 'sub_title', 'features', 'price', 'type', 'image', 'upload_folder'],
        'translate'     => [],

        'upload-folder' => '/uploads/pricelist/pricelist',
        'uploads'       => [
            'single'   => [],
            'multiple' => [],
        ],
        'casts'         => [
        ],
        'revision'      => [],
        'perPage'       => '20',
        'search'        => [
            'name' => 'like',
            'status',
        ],
    ],
];
