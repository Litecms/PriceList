<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreatePriceListsTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        /*
         * Table: price_lists
         */
        Schema::create(config('litecms.pricelist.price_list.model.table'), function ($table) {
            $table->increments('id');
            $table->string('title', 255)->nullable();
            $table->string('sub_title', 255)->nullable();
            $table->text('features')->nullable();
            $table->decimal('price', 10,2)->nullable();
            $table->enum('type', ['Day','Month','Year'])->nullable();
            $table->text('image')->nullable();
            $table->string('slug', 200)->nullable();
            $table->enum('status', ['Show','Hide'])->nullable();
            $table->integer('user_id')->nullable();
            $table->string('user_type', 100)->nullable();
            $table->string('upload_folder', 100)->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
        });
    }

    /*
    * Reverse the migrations.
    *
    * @return void
    */

    public function down()
    {
        Schema::drop(config('litecms.pricelist.price_list.model.table'));
    }
}
