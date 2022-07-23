<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_en')->nullable();
            $table->text('description');
            $table->string('slogan')->nullable();
            $table->text('using_advice')->nullable();
            $table->text('composition')->nullable();
            $table->float('selling_price_mad');
            $table->float('starting_price_mad')->nullable();
            $table->float('selling_price_dollar');
            $table->float('starting_price_dollar')->nullable();
            $table->float('selling_price_euro');
            $table->float('starting_price_euro')->nullable();
            $table->integer('qte');
            $table->string('image');
            $table->string('image_hover');
            $table->string('shipping');
            $table->string('shipping_en')->nullable();
            $table->text('product_description')->nullable();
            $table->text('ingredients')->nullable();
            $table->boolean('show')->default(true)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
