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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id('id_peminjaman');
            $table->char('kode_barang', 20);
            $table->char('nip', 20);
            $table->string('bidang', 15);
            $table->string('nama_barang', 20);
            $table->dateTime('tgl_peminjaman');
            $table->char('jumlah', 10);
            $table->enum('level', ['peminjaman', 'pengembalian']);
            $table->enum('status', ['diproses', 'diterima']);
            $table->timestamps();

            $table->foreign('nip')->references('nip')->on('Pengguna');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
};
