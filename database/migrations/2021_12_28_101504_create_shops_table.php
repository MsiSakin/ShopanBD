<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('shopkeeper_id');
            $table->bigInteger('category_id');
            $table->string('shop_name');
            $table->string('shop_address');
            $table->string('shop_description');
            $table->string('banner');
            $table->string('shop_phone');
            $table->string('shop_status');
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
        Schema::dropIfExists('shops');
    }
}
