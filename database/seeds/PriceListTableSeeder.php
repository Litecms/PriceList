<?php

use Illuminate\Database\Seeder;

class PriceListTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('price_lists')->insert([

            [
                'title'      => 'BASIC',
                'slug'       => 'basic',
                'sub_title'  => '',
                'features'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'price'      => '300',
                'type'       => null,
                'image'      => '',
                'created_at' => '2016-07-19 16:49:38',
                'updated_at' => '2016-07-19 11:19:38',
                'deleted_at' => null,
            ],
            [
                'title'      => 'STANDARD',
                'slug'       => 'standard',
                'sub_title'  => '',
                'features'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'price'      => '800',
                'type'       => null,
                'image'      => '',
                'created_at' => '2016-07-19 16:50:58',
                'updated_at' => '2016-07-19 11:20:58',
                'deleted_at' => null,
            ],
            [
                'title'      => 'PREMIUM',
                'slug'       => 'premium',
                'sub_title'  => '',
                'features'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'price'      => '1000',
                'type'       => null,
                'image'      => '',
                'created_at' => '2016-07-19 16:48:28',
                'updated_at' => '2016-07-19 11:18:28',
                'deleted_at' => null,
            ],

        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/pricelist/pricelist',
                'name'        => 'PriceLists',
                'description' => null,
                'icon'        => 'fa fa-usd',
                'target'      => null,
                'order'       => 210,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'pricelists',
                'name'        => 'PriceLists',
                'description' => null,
                'icon'        => null,
                'target'      => null,
                'order'       => 210,
                'status'      => 1,
            ],

        ]);

        DB::table('permissions')->insert([
            [
                'slug' => 'price_list.price_list.view',
                'name' => 'View PriceList',
            ],
            [
                'slug' => 'price_list.price_list.create',
                'name' => 'Create PriceList',
            ],
            [
                'slug' => 'price_list.price_list.edit',
                'name' => 'Update PriceList',
            ],
            [
                'slug' => 'price_list.price_list.delete',
                'name' => 'Delete PriceList',
            ],
        ]);

        DB::table('settings')->insert([
            // Uncomment  and edit this section for entering value to settings table.
            /*
        [
        'key'      => 'price_list.price_list.key',
        'name'     => 'Some name',
        'value'    => 'Some value',
        'type'     => 'Default',
        ],
         */
        ]);
    }
}
