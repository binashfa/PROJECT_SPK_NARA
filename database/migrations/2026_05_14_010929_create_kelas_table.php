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
        Schema::create('kelas', function (Blueprint $table) {

            $table->id();

            // CONTOH: 7A, 8B, 9C
            $table->string('nama_kelas');

            // TINGKAT SMP
            $table->enum('tingkat', [
                '7',
                '8',
                '9'
            ]);

            // WALI KELAS
            $table->string('wali_kelas')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};