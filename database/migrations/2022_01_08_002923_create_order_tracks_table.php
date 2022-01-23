<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_tracks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_id');
            $table->integer('driver_id');
            $table->char('status', 1)->default(0)->comment('0: pesanan baru, 1: sudah dijemput, 2: sudah sampai, ');
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
        Schema::dropIfExists('order_tracks');
    }
}
