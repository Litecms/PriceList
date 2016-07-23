<?php

use Illuminate\Database\Migrations\Migration;

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
         * Table: pricelists
         */
        Schema::create('price_lists', function ($table) {
            $table->increments('id');
            $table->string('title', 255)->nullable();
            $table->string('sub_title', 255)->nullable();
            $table->text('features')->nullable();
            $table->decimal('price', 10,2)->nullable();
            $table->enum('type', ['Day','Month','Year'])->nullable();
            $table->text('image')->nullable();
            $table->string('slug', 200)->nullable();
            $table->enum('status', ['draft', 'published', 'hidden', 'suspended', 'spam'])->default('draft')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::drop('price_lists');
    }
}
