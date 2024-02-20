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
        Schema::create('perlengkapan', function (Blueprint $table) {
            $table->char('id_perlengkapan', 13)->primary();
            $table->unsignedInteger('id_mobil');
            $table->string('nama_perlengkapan', 50);

            $table->timestamps();

            $table->foreign('id_mobil')->references('id_mobil')->on('mobil')
                    ->cascadeondelete()->cascadeonupdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perlengkapan');
    }
};
