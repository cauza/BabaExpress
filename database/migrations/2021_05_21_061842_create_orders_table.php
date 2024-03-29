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
            $table->bigIncrements('id');
            $table->string('mitra_id');
            $table->string('resi');
            $table->string('nama_pengirim');
            $table->string('alamat_pengirim');
            $table->string('kontak_pengirim');
            $table->string('nama_penerima');
            $table->string('alamat_penerima');
            $table->string('kontak_penerima');
            $table->string('nama_barang');
            $table->string('berat');
            $table->string('harga');
            $table->string('volume');
            $table->integer('kecamatan_id');
            $table->integer('ongkir');
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
        Schema::dropIfExists('orders');
    }
}
