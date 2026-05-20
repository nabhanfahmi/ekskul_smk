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
        Schema::create('opsi_konselings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pertanyaan_id')
                ->constrained('pertanyaan_konselings')
                ->onDelete('cascade');

            $table->string('jawaban');

            $table->integer('skor_olahraga')->default(0);
            $table->integer('skor_seni')->default(0);
            $table->integer('skor_teknologi')->default(0);
            $table->integer('skor_kepemimpinan')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opsi_konselings');
    }
};
