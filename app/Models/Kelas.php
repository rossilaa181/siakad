<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas'; //mendefiniskan bahwa model ini terkait dengan tabel kelas

    //mendefinisikan relasi dengan tabel mahasiswa
    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
