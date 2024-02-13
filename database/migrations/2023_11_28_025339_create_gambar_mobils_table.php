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
        Schema::create('gambar_mobil', function (Blueprint $table) {
            $table->string('no_polisi', 10);
            $table->string('gambar_mobil', 50);
            
            $table->foreign('no_polisi')->references('no_polisi')->on('mobil')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gambar_mobil');
    }
};
