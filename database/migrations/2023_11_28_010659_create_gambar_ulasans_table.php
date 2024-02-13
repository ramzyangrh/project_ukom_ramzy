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
        Schema::create('gambar_ulasan', function (Blueprint $table) {
            $table->char('id_ulasan', 13);
            $table->string('gambar_ulasan', 50);
            
            $table->foreign('id_ulasan')->references('id_ulasan')->on('ulasan')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gambar_ulasan');
    }
};
