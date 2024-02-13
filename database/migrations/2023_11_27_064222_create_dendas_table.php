<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('denda', function (Blueprint $table) {
            $table->char('id_denda', 13)->primary();
            $table->char('id_pengembalian', 12);
            $table->char('id_pembayaran', 12);
            $table->unsignedBigInteger('total_denda');
            $table->enum('status_pembayaran', ['sudah dibayar', 'belum_dibayar']);
            $table->enum('jenis_denda', ['kehilangan', 'kerusakan']);
            $table->text('deskripsi_denda');
            $table->datetime('tenggat_waktu_pembayaran');

            $table->timestamps();

            $table->foreign('id_pengembalian')->references('id_pengembalian')->on('pengembalian')
                    ->cascadeondelete()->cascadeonupdate();
            $table->foreign('id_pembayaran')->references('id_pembayaran')->on('pembayaran')
                    ->cascadeondelete()->cascadeonupdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('denda');
    }
};
