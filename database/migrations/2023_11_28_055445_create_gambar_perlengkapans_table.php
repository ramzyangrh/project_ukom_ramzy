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
        Schema::create('gambar_perlengkapan', function (Blueprint $table) {
            $table->char('id_perlengkapan', 13);
            $table->string('gambar_perlengkapan', 50);

            $table->timestamps();

            $table->foreign('id_perlengkapan')->references('id_perlengkapan')->on('perlengkapan')
                    ->cascadeondelete()->cascadeonupdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gambar_perlengkapan');
    }
};
