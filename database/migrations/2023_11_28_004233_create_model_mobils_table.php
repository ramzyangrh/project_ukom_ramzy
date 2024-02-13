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
        Schema::create('model_mobil', function (Blueprint $table) {
            $table->char('id_model_mobil', 13)->primary();
            $table->char('id_tarif', 13);
            $table->enum('tipe_mobil', ['sedan', 'suv', 'truck', 'minibus']);
            $table->enum('merek_mobil', ['toyota', 'daihatsu', 'suzuki', 'mitsubishi', 'nissan', 'isuzu', 'bmw', 'mercedes-benz', 'wuling', 'honda']);
            $table->year('tahun_produksi');
            //$table->text('deskripsi_model');

            $table->timestamps();

            $table->foreign('id_tarif')->references('id_tarif')->on('tarif')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_mobil');
    }
};
