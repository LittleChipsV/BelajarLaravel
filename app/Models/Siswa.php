<?php

namespace App\Models;

class Siswa extends User
{
    protected $table = 'users';

    public function kelas(){
        return $this->belongsToMany(Kelas::class, 'siswa_kelas', 'id_siswa', 'id_kelas')->withTimestamps()->as('kelas');
    }

    public function nilai(){
        return $this->hasMany(Nilai::class, "id_siswa");
    }
}
