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
        Schema::create('pengecekan', function (Blueprint $table) {
            $table->char('id_pengecekan', 13)->primary();
            $table->char('id_pengembalian', 12);
            $table->dateTime('tanggal_pengecekan');

            $table->timestamps();

            $table->foreign('id_pengembalian')->references('id_pengembalian')->on('pengembalian')
                    ->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengecekan');
    }
};
