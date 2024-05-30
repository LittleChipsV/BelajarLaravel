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
        Schema::create('guru_data_mengampu', function (Blueprint $table) {
            $table->foreignId('id_guru')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_tuple_mata_pelajaran_kelas')->references('id')->on('mata_pelajaran_kelas')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['id_guru', 'id_tuple_mata_pelajaran_kelas']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru_data_mengampu');
    }
};
