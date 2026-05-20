<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ekstrakurikulers', function (Blueprint $table) {

            if (!Schema::hasColumn('ekstrakurikulers', 'deskripsi')) {
                $table->text('deskripsi')->nullable();
            }

            if (!Schema::hasColumn('ekstrakurikulers', 'gambar')) {
                $table->string('gambar')->nullable();
            }

            if (!Schema::hasColumn('ekstrakurikulers', 'jadwal')) {
                $table->string('jadwal')->nullable();
            }

            if (!Schema::hasColumn('ekstrakurikulers', 'pembina')) {
                $table->string('pembina')->nullable();
            }

            if (!Schema::hasColumn('ekstrakurikulers', 'lokasi')) {
                $table->string('lokasi')->nullable();
            }

        });
    }

    public function down(): void
    {
        Schema::table('ekstrakurikulers', function (Blueprint $table) {

            $table->dropColumn([
                'deskripsi',
                'gambar',
                'jadwal',
                'pembina',
                'lokasi'
            ]);

        });
    }
};