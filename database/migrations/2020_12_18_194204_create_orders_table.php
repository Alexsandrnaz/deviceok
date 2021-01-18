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
            $table->id('id');
            $table->string('userName')->nullable();
            $table->string('userMail')->nullable();
            $table->string('userPhone')->nullable();
            $table->string('userQuestion')->nullable();
            $table->string('userAddress')->nullable();
            $table->string('userDeliveryStatus')->nullable();
            $table->integer('userOrderStatus')->default(0);
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
