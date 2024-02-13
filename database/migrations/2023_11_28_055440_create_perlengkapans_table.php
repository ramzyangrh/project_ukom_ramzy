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
            $table->string('no_polisi', 10);
            $table->string('nama_perlengkapan', 50);

            $table->timestamps();

            $table->foreign('no_polisi')->references('no_polisi')->on('mobil')
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
