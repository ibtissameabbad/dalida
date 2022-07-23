<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('firstname')->nullable(false);
            $table->string('lastname')->nullable(false);
            $table->string('email')->nullable(true);
            $table->string('telephone')->nullable(true);
            $table->string('city')->nullable(true);
            $table->text('address')->nullable(false);
            $table->string('code_postal')->nullable(true);
            $table->unsignedFloat('total')->nullable(false);
            $table->enum('currency', ['mad', 'dollar', 'euro'])->nullable(false);
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
        Schema::dropIfExists('orders');
    }
}
