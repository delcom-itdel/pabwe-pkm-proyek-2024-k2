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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable(); // Kolom untuk path foto
            $table->string('name');              // Kolom untuk nama
            $table->string('group');             // Kolom untuk kelompok (misalnya, 'Staff Guru')
            $table->string('position');          // Kolom untuk jabatan
            $table->timestamps();                // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
