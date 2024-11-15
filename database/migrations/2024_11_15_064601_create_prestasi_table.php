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
        Schema::create('prestasi', function (Blueprint $table) {
            $table->id();
            $table->string('cover'); // Untuk menyimpan file gambar cover
            $table->string('judul'); // Untuk menyimpan judul prestasi
            $table->year('tahun_perolehan'); // Untuk menyimpan tahun perolehan prestasi
            $table->text('deskripsi'); // Untuk menyimpan deskripsi prestasi
            $table->timestamps(); // Untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasi');
    }
};
