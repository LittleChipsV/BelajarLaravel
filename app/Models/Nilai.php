<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table = "nilai";
    protected $fillable = ["nilai", "id_siswa", "id_topik"];

    public function siswa(){
        return $this->belongsTo(User::class, 'id_siswa');
    }

    public function topik(){
        return $this->belongsTo(Topik::class, 'id_topik');
    }
}
