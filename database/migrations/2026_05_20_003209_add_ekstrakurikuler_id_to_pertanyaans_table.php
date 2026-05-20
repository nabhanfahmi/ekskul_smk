<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pertanyaans', function (Blueprint $table) {

            $table->foreignId('ekstrakurikuler_id')
                ->after('id')
                ->constrained()
                ->onDelete('cascade');

        });
    }

    public function down(): void
    {
        Schema::table('pertanyaans', function (Blueprint $table) {

            $table->dropForeign(['ekstrakurikuler_id']);
            $table->dropColumn('ekstrakurikuler_id');

        });
    }
};