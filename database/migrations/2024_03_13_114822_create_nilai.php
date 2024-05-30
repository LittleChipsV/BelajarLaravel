<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\{Schema, DB};

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('nilai');
            $table->foreignId('id_siswa')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_topik')->references('id')->on('topik')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->unique(['id_siswa', 'id_topik']);
        });

        DB::statement('ALTER TABLE nilai ADD CONSTRAINT cek_nilai CHECK (nilai >= 0 AND nilai <= 100)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
