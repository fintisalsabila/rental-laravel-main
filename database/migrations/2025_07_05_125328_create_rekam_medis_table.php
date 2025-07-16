<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('no_telpon');
            $table->string('nomor_rangka');
            $table->string('nomor_polisi');
            $table->string('jenis_mobil');
            $table->string('nama_customer');
            $table->text('masalah_kerusakan');

            $table->string('service_bulanan_balancing')->nullable();
            $table->text('uraian')->nullable();
            $table->date('tanggal_kerusakan');
            $table->string('dimana');
            $table->string('estimasi')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rekam_medis');
    }
};