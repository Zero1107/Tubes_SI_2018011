<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pelanggan')->unsigned();
            $table->date('tgl_transaksi');
            $table->string('status', 30);
            $table->integer('total');
            $table->timestamps();
        });

        Schema::table('transaksi', function (Blueprint $table) {
         
            $table->foreign('id_pelanggan')->references('id')->on('pelanggan')->onUpdate('cascade')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
};
