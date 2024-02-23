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
        Schema::create('users', function (Blueprint $table) {
 
            $table->string('username', 255)->primary();
            $table->char('id_admin', 12)->nullable();
            $table->char('id_penyewa', 13)->nullable();
            $table->char('id_pemilik_mobil', 12)->nullable();
            $table->string('password', 255);
            $table->enum('role', ['admin', 'pemilik', 'pelanggan'])->default('pelanggan');
            $table->string('email', 100)->nullable();
            $table->string('profile_image')->nullable();
            
            $table->timestamps();
    
            $table->foreign('id_admin')->references('id_admin')->on('admin')->onDelete('cascade');
            $table->foreign('id_penyewa')->references('id_penyewa')->on('penyewa')->onDelete('cascade');
            $table->foreign('id_pemilik_mobil')->references('id_pemilik_mobil')->on('pemilik_mobil')->onDelete('cascade');
        }); 
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
