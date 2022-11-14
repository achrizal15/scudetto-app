<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDasTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('das_transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('lapangan_id');
            $table->foreign('lapangan_id')->references('id')->on('lapangans');
            // $table->foreignId("user_id");
            // $table->foreignId("lapangan_id");
            $table->string("kode");
            $table->integer("durasi_sewa");
            $table->datetime("jam_pesan_awal");
            $table->datetime("jam_pesan_akhir");
            $table->integer("total_bayar");
            $table->string("bukti_bayar")->nullable();
            $table->enum("status",["PENDING","PROSES","SELESAI","BATAL"])->default("PENDING");
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
        Schema::dropIfExists('das_transaksis');
    }
}
