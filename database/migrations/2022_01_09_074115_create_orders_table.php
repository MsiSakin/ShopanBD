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
            $table->bigInteger('customer_id');
            $table->string('session_id');
            $table->date('date');
            $table->string('phone');
            $table->text('address');
            $table->bigInteger('area_id');
            $table->bigInteger('sub_area_id');
            $table->string('payment_type');
            $table->float('total');
            $table->float('grand_total');
            $table->bigInteger('delivery_man_id')->nullable();
            $table->float('delivery_charge');
            $table->enum('status',['pending','processing','on_the_way','delivered','canceled'])->default('pending');
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
