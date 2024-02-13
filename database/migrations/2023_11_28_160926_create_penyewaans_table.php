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
        Schema::create('penyewaan', function (Blueprint $table) {
            $table->char('id_penyewaan', 12)->primary();
            $table->char('id_penyewa', 12);
            $table->string('no_polisi', 10);
            $table->char('id_pengembalian', 12);
            $table->char('id_pembayaran', 12);
            $table->char('id_tarif', 12);
            $table->dateTime('tanggal_mulai');
            $table->dateTime('tanggal_selesai');
            $table->unsignedBigInteger('total_biaya');

            $table->timestamps();

            $table->foreign('id_penyewa')->references('id_penyewa')->on('penyewa')
                    ->cascadeOnDelete()->cascadeOnDelete();
            $table->foreign('no_polisi')->references('no_polisi')->on('mobil')
                    ->cascadeOnDelete()->cascadeOnDelete();
            $table->foreign('id_pengembalian')->references('id_pengembalian')->on('pengembalian')
                    ->cascadeOnDelete()->cascadeOnDelete();
            $table->foreign('id_pembayaran')->references('id_pembayaran')->on('pembayaran')
                    ->cascadeOnDelete()->cascadeOnDelete();
            $table->foreign('id_tarif')->references('id_tarif')->on('tarif')
                    ->cascadeOnDelete()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyewaan');
    }
};
