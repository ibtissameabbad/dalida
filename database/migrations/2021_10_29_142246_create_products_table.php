<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_en')->nullable();
            $table->text('description');
            $table->string('slogan')->nullable();
            $table->string('using_advice')->nullable();
            $table->string('composition')->nullable();
            $table->string('shipping')->nullable();
            $table->float('selling_price_mad');
            $table->float('starting_price_mad')->nullable();
            $table->float('selling_price_dollar');
            $table->float('starting_price_dollar')->nullable();
            $table->float('selling_price_euro');
            $table->float('starting_price_euro')->nullable();
            $table->integer('qte');
            $table->string('image');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->timestamps();
//            $table->foreign('user_id')
//                ->references('id')
//                ->on('users')
//                ->onDelete('cascade');
//            $table->foreign('category_id')
//                ->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('products');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
