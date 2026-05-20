<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('hasil_konselings', function (Blueprint $table) {

            $table->longText('hasil')->change();

        });
    }

    public function down(): void
    {
        Schema::table('hasil_konselings', function (Blueprint $table) {
            $table->text('hasil')->change();
        });
    }
};