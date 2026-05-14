<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('absensis', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id');

            $table->string('foto');

            $table->double('latitude');

            $table->double('longitude');

            $table->string('status')->default('hadir');

            $table->timestamps();

            $table->foreignId('kelas_id')
                ->after('user_id')
                ->constrained('kelas')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('absensis', function (Blueprint $table) {

            $table->dropForeign(['kelas_id']);
            $table->dropColumn('kelas_id');

        });
    }
};