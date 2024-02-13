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
        Schema::create('ulasan', function (Blueprint $table) {
            $table->char('id_ulasan', 13)->primary();
            $table->char('id_penyewa', 13);
            $table->string('no_polisi', 10);
            $table->text('ulasan');
            $table->tinyInteger('rating');

            $table->timestamps();

            $table->foreign('id_penyewa')->references('id_penyewa')->on('penyewa')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('no_polisi')->references('no_polisi')->on('mobil')->cascadeOnDelete()->cascadeOnUpdate();

           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasan');
    }
};
