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
        Schema::create('pengecekan_perlengkapan', function (Blueprint $table) {
            $table->char('id_pengecekan', 13);
            $table->char('id_perlengkapan', 13);
            $table->enum('kondisi', ['baik', 'rusak', 'tidak ada']);
            
            $table->timestamps();

            $table->foreign('id_pengecekan')->references('id_pengecekan')->on('pengecekan')
                    ->cascadeondelete()->cascadeonupdate();
            $table->foreign('id_perlengkapan')->references('id_perlengkapan')->on('perlengkapan')
                    ->cascadeondelete()->cascadeonupdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengecekan_perlengkapan');
    }
};
