<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'tabel_guru';
    protected $fillable = ['nama_guru', 'jenis_kelamin', 'id_mata_pelajaran'];

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'id_mata_pelajaran');
    }
}
