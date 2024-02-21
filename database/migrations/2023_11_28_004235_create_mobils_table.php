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
        Schema::create('mobil', function (Blueprint $table) {
            $table->increments('id_mobil');
            $table->char('id_pemilik_mobil', 12)->nullable()->default(null);
            $table->char('id_model_mobil', 13)->nullable()->default(null);
            $table->string('merek'); // Tambahkan kolom 'brand' dengan tipe string
            $table->text('tipe'); // Tambahkan kolom 'details'
            $table->enum('status', ['Tersedia', 'Tidak Tersedia']); // Tambahkan kolom 'availability' dengan tipe enum
            $table->string('image',50); // Tambahkan kolom 'image'
            // $table->string('foto_stnk_mobil', 50);
            // $table->enum('status_ketersediaan', ['tersedia', 'sedang dipakai', 'sedang rusak']);
            $table->timestamps();

            $table->foreign('id_pemilik_mobil')->references('id_pemilik_mobil')->on('pemilik_mobil')
                    ->cascadeOnDelete()->cascadeonUpdate();
            $table->foreign('id_model_mobil')->references('id_model_mobil')->on('model_mobil')
                    ->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobil');
    }
};
