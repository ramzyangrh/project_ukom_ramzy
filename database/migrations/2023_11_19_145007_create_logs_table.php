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
        Schema::create('log', function (Blueprint $table) {
            $table->integer('id_log')->primary();
            $table->string('ip_address', 100)->nullable();
            $table->string('user', 100)->nullable();
            $table->text('log')->nullable();
            $table->dateTime('tanggal');
            $table->enum('aksi', ['create', 'update', 'delete']);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log');
    }
};
