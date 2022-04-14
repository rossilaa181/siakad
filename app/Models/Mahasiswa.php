<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa'; // Eloquent akan membuat model mahasiswa menyimpan record ditabel mahasiswa
    protected $primaryKey = 'id_mahasiswa'; // Memanggil isi DB Dengan primarykey
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Nim',
        'Nama',
        'Kelas',
        'Jurusan',
        'Jenis_Kelamin',
        'Email',
        'Alamat',
        'Tanggal_Lahir'
    ];

    //mendefinisikan relasi dengan tabel kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    //Mendefinisikan relasi dengan tabel bantu mahasiswa_matakuliah
    public function mahasiswa_matakuliah()
    {
        return $this->belongsToMany(Mahasiswa_MataKuliah::class);
    }
}
