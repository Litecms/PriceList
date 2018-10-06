<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Language files for price_list in pricelist package
    |--------------------------------------------------------------------------
    |
    | The following language lines are  for  price_list module in pricelist package
    | and it is used by the template/view files in this module
    |
    */

    /**
     * Singlular and plural name of the module
     */
    'name'          => 'PriceList',
    'names'         => 'PriceLists',
    
    /**
     * Singlular and plural name of the module
     */
    'title'         => [
        'main'  => 'PriceLists',
        'sub'   => 'PriceLists',
        'list'  => 'List of price_lists',
        'edit'  => 'Edit price_list',
        'create'    => 'Create new price_list'
    ],

    /**
     * Options for select/radio/check.
     */
    'options'       => [
            'type'                => [

                            'Day'  =>['name'=>'type','value'=>'Day'],
                            'Month'=>['name'=>'type','value'=>'Month'],
                            'Year' =>['name'=>'type','value'=>'Year'],
                        ],
            'status'              => [
                'Show'=> ['name'=>'status','value'=>'Show'],
                'Hide'=> ['name'=>'status','value'=>'Hide'],
            ],
    ],

    /**
     * Placeholder for inputs
     */
    'placeholder'   => [
        'id'                         => 'Please enter id',
        'title'                      => 'Please enter title',
        'sub_title'                  => 'Please enter sub title',
        'features'                   => 'Please enter features',
        'price'                      => 'Please enter price',
        'type'                       => 'Please select type',
        'image'                      => 'Please enter image',
        'slug'                       => 'Please enter slug',
        'status'                     => 'Please select status',
        'user_id'                    => 'Please enter user id',
        'user_type'                  => 'Please enter user type',
        'upload_folder'              => 'Please enter upload folder',
        'deleted_at'                 => 'Please select deleted',
        'created_at'                 => 'Please select created',
        'updated_at'                 => 'Please select updated',
    ],

    /**
     * Labels for inputs.
     */
    'label'         => [
        'id'                         => 'Id',
        'title'                      => 'Title',
        'sub_title'                  => 'Sub title',
        'features'                   => 'Features',
        'price'                      => 'Price',
        'type'                       => 'Type',
        'image'                      => 'Image',
        'slug'                       => 'Slug',
        'status'                     => 'Status',
        'user_id'                    => 'User id',
        'user_type'                  => 'User type',
        'upload_folder'              => 'Upload folder',
        'deleted_at'                 => 'Deleted at',
        'created_at'                 => 'Created',
        'updated_at'                 => 'Updated ',
    ],

    /**
     * Columns array for show hide checkbox.
     */
    'cloumns'         => [
        'title'                      => ['name' => 'Title', 'data-column' => 1, 'checked'],
        'price'                      => ['name' => 'Price', 'data-column' => 2, 'checked'],
        'type'                       => ['name' => 'Type', 'data-column' => 3, 'checked'],
        'status'                     => ['name' => 'Status', 'data-column' => 4, 'checked'],
    ],

    /**
     * Tab labels
     */
    'tab'           => [
        'name'  => 'PriceLists',
    ],

    /**
     * Texts  for the module
     */
    'text'          => [
        'preview' => 'Click on the below list for preview',
    ],
];
