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
        Schema::create('mata_pelajaran_kelas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mata_pelajaran')->references('id')->on('mata_pelajaran')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_kelas')->references('id')->on('kelas')->onDelete('cascade')->onUpdate('cascade');
            $table->unique(['id_mata_pelajaran', 'id_kelas']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_pelajaran_kelas');
    }
};
