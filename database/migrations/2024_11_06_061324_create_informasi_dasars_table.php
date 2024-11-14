<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('informasi_dasars', function (Blueprint $table) {
            $table->id();
            $table->text('kontak_phone')->nullable();
            $table->text('kontak_email')->nullable();
            $table->text('nama_lokasi')->nullable();
            $table->text('alamat_lokasi')->nullable();
            $table->text('peta_lokasi')->nullable();
            $table->text('instagram')->nullable(); // Menambahkan nullable untuk kolom sosial media
            $table->text('youtube')->nullable();
            $table->text('tiktok')->nullable();
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('highlight')->nullable(); // Menambahkan nullable untuk kolom yang bisa kosong
            $table->text('sub_highlight')->nullable();
            $table->text('cover')->nullable(); // Menambahkan kolom untuk file cover
            $table->text('judul_video')->nullable(); // Kolom untuk judul video
            $table->text('link_video')->nullable(); // Kolom untuk link video
            $table->integer('jumlah_peserta_didik')->nullable()->default(0); // Jumlah peserta didik
            $table->integer('jumlah_guru')->nullable()->default(0); // Jumlah guru & tendik
            $table->integer('jumlah_kelas')->nullable()->default(0); // Jumlah kelas
            $table->text('foto_kepala_sekolah')->nullable(); // Kolom untuk foto kepala sekolah
            $table->text('nama_kepala_sekolah')->nullable();
            $table->text('sambutan_kepala_sekolah')->nullable(); // Kolom untuk sambutan kepala sekolah
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_dasars');
    }
};
