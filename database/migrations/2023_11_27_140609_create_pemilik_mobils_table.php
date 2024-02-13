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
        Schema::create('pemilik_mobil', function (Blueprint $table) {
            $table->char('id_pemilik_mobil', 12)->primary();
            $table->string('nama_pemilik_mobil', 50)->nullable();
            $table->text('alamat_pemilik_mobil')->nullable();
            $table->unsignedBigInteger('no_telepon_pemilik_mobil')->nullable();
            $table->string('foto_bpkb_pemilik_mobil', 50)->nullable();
            $table->string('foto_ktp_pemilik_mobil', 50)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemilik_mobil');
    }
};
