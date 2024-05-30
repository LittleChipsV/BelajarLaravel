<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topik extends Model
{
    use HasFactory;
    protected $table = "topik";
    protected $fillable = ["nama_topik", "id_tuple_mata_pelajaran_kelas"];

    public function tupleMataPelajaranKelas(){
        return $this->belongsTo(TupleMataPelajaranKelas::class, 'id_tuple_mata_pelajaran_kelas');
    }
}
