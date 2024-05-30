<?php

namespace App\Models;

class Guru extends User
{
    protected $table = 'users';

    public function dataMengampu(){
        return $this->belongsToMany(TupleMataPelajaranKelas::class, 'guru_data_mengampu', 'id_guru', 'id_tuple_mata_pelajaran_kelas');
    }
}
