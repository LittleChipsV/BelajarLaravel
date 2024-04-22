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
        Schema::create('tabel_guru', function (Blueprint $table) {
            $table->id();
            $table->string('nama_guru');
            $table->enum('jenis_kelamin', ['laki', 'perempuan']);
            $table->foreignId('id_mata_pelajaran')->references('id')->on('tabel_mata_pelajaran')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_guru');
    }
};
