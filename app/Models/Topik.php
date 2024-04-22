<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topik extends Model
{
    use HasFactory;
    protected $table = "tabel_topik";
    protected $fillable = ["nama_topik", "id_mata_pelajaran"];

    public function mataPelajaran(){
        return $this->belongsTo(MataPelajaran::class, 'id_mata_pelajaran');
    }
}
