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
        Schema::create('tabel_nilai', function (Blueprint $table) {
            $table->id('id_nilai');
            $table->integer('nilai');
            $table->foreignId('id_topik')->references('id_topik')->on('tabel_topik')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_siswa')->references('id_siswa')->on('tabel_siswa')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_nilai');
    }
};
