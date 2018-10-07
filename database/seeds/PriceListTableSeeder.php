<?php

namespace Litecms;

use DB;
use Illuminate\Database\Seeder;

class PriceListTableSeeder extends Seeder
{
    public function run()
    {
        DB::table(config('litecms.pricelist.price_list.model.table'))->insert([
            ['id' => '1', 'title' => 'Latest CMS', 'sub_title' => 'Latest CMS Prices', 'features' => 'Free updates Priority support', 'price' => '100', 'type' => 'Day', 'image' => '[{"title":"Dsc01736","caption":"Dsc01736","url":"Dsc01736","desc":null,"folder":"2018\\/02\\/01\\/072956853\\/image","time":"2018-02-01 07:30:44","path":"pricelist\\/price_list\\/2018\\/02\\/01\\/072956853\\/image\\/dsc01736.jpg","file":"dsc01736.jpg"}]', 'slug' => 'randomised-words', 'status' => 'Show', 'user_id' => '1', 'user_type' => 'App\\User', 'upload_folder' => null, 'deleted_at' => null, 'created_at' => '2018-02-01 07:30:46', 'updated_at' => '2018-05-11 11:51:34'],
            ['id' => '2', 'title' => 'General Price', 'sub_title' => 'lavalite Normal Prices', 'features' => 'Unlimited websites', 'price' => '500', 'type' => 'Month', 'image' => '[{"title":"Dsc01736","caption":"Dsc01736","url":"Dsc01736","desc":null,"folder":"2018\\/02\\/01\\/072956853\\/image","time":"2018-02-01 07:30:44","path":"pricelist\\/price_list\\/2018\\/02\\/01\\/072956853\\/image\\/dsc01736.jpg","file":"dsc01736.jpg"}]', 'slug' => 'lorem-ipsum', 'status' => 'Show', 'user_id' => '1', 'user_type' => 'App\\User', 'upload_folder' => null, 'deleted_at' => null, 'created_at' => '2018-02-01 07:32:31', 'updated_at' => '2018-05-11 11:50:48'],
            ['id' => '3', 'title' => 'Latest Package', 'sub_title' => 'Latest Packages Prices', 'features' => '4 tables
Unlimited websites
CMS Navigation
Free updates
Priority support', 'price' => '1000', 'type' => 'Year', 'image' => '[{"title":"Dsc01736","caption":"Dsc01736","url":"Dsc01736","desc":null,"folder":"2018\\/02\\/01\\/072956853\\/image","time":"2018-02-01 07:30:44","path":"pricelist\\/price_list\\/2018\\/02\\/01\\/072956853\\/image\\/dsc01736.jpg","file":"dsc01736.jpg"}]', 'slug' => 'readable-english', 'status' => 'Show', 'user_id' => '1', 'user_type' => 'App\\User', 'upload_folder' => null, 'deleted_at' => null, 'created_at' => '2018-02-01 07:33:30', 'updated_at' => '2018-05-11 11:49:41'],

        ]);

        DB::table('permissions')->insert([
            [
                'slug' => 'pricelist.price_list.view',
                'name' => 'View PriceList',
            ],
            [
                'slug' => 'pricelist.price_list.create',
                'name' => 'Create PriceList',
            ],
            [
                'slug' => 'pricelist.price_list.edit',
                'name' => 'Update PriceList',
            ],
            [
                'slug' => 'pricelist.price_list.delete',
                'name' => 'Delete PriceList',
            ],

        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/pricelist/price_list',
                'name'        => 'PriceList',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 4,
                'key'         => null,
                'url'         => 'price_list',
                'name'        => 'PriceList',
                'description' => null,
                'icon'        => null,
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

        ]);

        DB::table('settings')->insert([
            // Uncomment  and edit this section for entering value to settings table.
            /*
        [
        'pacakge'   => 'Pricelist',
        'module'    => 'PriceList',
        'user_type' => null,
        'user_id'   => null,
        'key'       => 'pricelist.price_list.key',
        'name'      => 'Some name',
        'value'     => 'Some value',
        'type'      => 'Default',
        'control'   => 'text',
        ],
         */
        ]);
    }
}
