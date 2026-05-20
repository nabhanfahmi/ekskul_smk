<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('galeri_ekstrakurikulers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('ekstrakurikuler_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('gambar_galeri');
            $table->text('deskripsi_galeri')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galeri_ekstrakurikulers');
    }
};