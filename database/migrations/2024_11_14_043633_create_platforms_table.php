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
    Schema::create('platform', function (Blueprint $table) {
        $table->id(); // Menambahkan kolom ID (primary key)
        $table->string('name'); // Kolom untuk nama platform
        $table->string('url');  // Kolom untuk URL platform
        $table->timestamps(); // Kolom created_at dan updated_at
    });
}

public function down()
{
    Schema::dropIfExists('platform');
}

};
