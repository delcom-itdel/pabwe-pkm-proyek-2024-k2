<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('berita_artikel', function (Blueprint $table) {
            $table->id(); // Menambahkan kolom ID (primary key)
            $table->string('cover')->nullable(); // Kolom untuk cover artikel
            $table->string('judul'); // Kolom untuk judul artikel
            $table->string('tindakan')->nullable(); // Kolom untuk tindakan artikel
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('berita_artikel');
    }
};
