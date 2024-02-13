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
        Schema::create('penyewa', function (Blueprint $table) {
            $table->char('id_penyewa', 13)->primary();
            $table->string('nama_penyewa', 50)->nullable();
            $table->text('alamat_penyewa')->nullable();
            $table->unsignedBigInteger('no_telepon_penyewa')->nullable();
            $table->string('foto_skck_penyewa', 50)->nullable();
            $table->string('foto_sim_penyewa', 50)->nullable();
            $table->string('foto_ktp_penyewa', 50)->nullable();
            $table->string('foto_penyewa', 50)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyewa');
    }
};
