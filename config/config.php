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
    'modules'   => ['price_list'],

    
    'price_list'       => [
        'model' => [
            'model'                 => \Litecms\Pricelist\Models\PriceList::class,
            'table'                 => 'price_lists',
            'presenter'             => \Litecms\Pricelist\Repositories\Presenter\PriceListPresenter::class,
            'hidden'                => [],
            'visible'               => [],
            'guarded'               => ['*'],
            'slugs'                 => ['slug' => 'title'],
            'dates'                 => ['deleted_at', 'createdat', 'updated_at'],
            'appends'               => [],
            'fillable'              => ['id',  'title',  'sub_title',  'features',  'price',  'type',  'image',  'slug',  'status',  'user_id',  'user_type',  'upload_folder',  'deleted_at',  'created_at',  'updated_at'],
            'translatables'         => [],
            'upload_folder'         => 'pricelist/price_list',
            'uploads'               => [
            
                    'image' => [
                        'count' => 1,
                        'type'  => 'image',
                    ],
                    'file' => [
                        'count' => 1,
                        'type'  => 'file',
                    ],
            
            ],

            'casts'                 => [
            
                'image'    => 'array',
                'file'      => 'array',
            
            ],

            'revision'              => [],
            'perPage'               => '20',
            'search'        => [
                'title'  => 'like',
                'price'  => 'like',
                'type'   => 'like',
                'status',
            ]
        ],

        'controller' => [
            'provider'  => 'Litecms',
            'package'   => 'Pricelist',
            'module'    => 'PriceList',
        ],

    ],
];
