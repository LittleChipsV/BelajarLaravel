<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = "tabel_siswa";
    protected $fillable = ["nama_siswa", "jenis_kelamin", "id_kelas"];

    public function kelas(){
        return $this->belongsTo(Kelas::class, "id_kelas");
    }
}
