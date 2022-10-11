<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'nim' => 2041720021,
                'nama' => 'Ahmad Rafif',
                'tanggal_lahir' => '2003-08-12',
                'jenis_kelamin' => 'Laki-laki',
                'jurusan' => 'Teknologi Informasi',
                'alamat' => 'Kediri',
                'email' => 'rarif@gmail.com',
                'foto' => '',
                'kelas_id' => '1',
            ],
            [
                'nim' => 2041720022,
                'nama' => 'Atmayanti',
                'tanggal_lahir' => '2001-06-11',
                'jenis_kelamin' => 'Perempuan',
                'jurusan' => 'Teknologi Informasi',
                'alamat' => 'Tulungagung',
                'email' => 'maya@gmail.com',
                'foto' => '',
                'kelas_id' => '1',
            ],
            [
                'nim' => 2041720023,
                'nama' => 'Ardha Nur',
                'tanggal_lahir' => '2001-08-23',
                'jenis_kelamin' => 'Perempuan',
                'jurusan' => 'Teknologi Informasi',
                'alamat' => 'Nganjuk',
                'email' => 'ardha@gmail.com',
                'foto' => '',
                'kelas_id' => '2',
            ],
            [
                'nim' => 2041720024,
                'nama' => 'Fauzan Pradana',
                'tanggal_lahir' => '2001-11-11',
                'jenis_kelamin' => 'Laki-laki',
                'jurusan' => 'Teknologi Informasi',
                'alamat' => 'Trenggalek',
                'email' => 'fauzan@gmail.com',
                'foto' => '',
                'kelas_id' => '2',
            ],
            [
                'nim' => 2041720025,
                'nama' => 'Taufik Anwar',
                'tanggal_lahir' => '2001-10-19',
                'jenis_kelamin' => 'Laki-laki',
                'jurusan' => 'Teknologi Informasi',
                'alamat' => 'Nganjuk',
                'email' => 'taufik@gmail.com',
                'foto' => '',
                'kelas_id' => '3',
            ],
            [
                'nim' => 2041720026,
                'nama' => 'Rosi Latansa',
                'tanggal_lahir' => '2002-04-14',
                'jenis_kelamin' => 'Perempuan',
                'jurusan' => 'Teknologi Informasi',
                'alamat' => 'Kediri',
                'email' => 'bels@gmail.com',
                'foto' => '',
                'kelas_id' => '3',
            ],
            [
                'nim' => 2041720027,
                'nama' => 'Isma Fitria',
                'tanggal_lahir' => '2001-05-19',
                'jenis_kelamin' => 'Perempuan',
                'jurusan' => 'Teknologi Informasi',
                'alamat' => 'Trenggalek',
                'email' => 'isma@gmail.com',
                'foto' => '',
                'kelas_id' => '3',
            ],
            [
                'nim' => 2041720028,
                'nama' => 'Thirsya Widya',
                'tanggal_lahir' => '2001-10-08',
                'jenis_kelamin' => 'Perempuan',
                'jurusan' => 'Teknologi Informasi',
                'alamat' => 'Kediri',
                'email' => 'thirsya@gmail.com',
                'foto' => '',
                'kelas_id' => '4',
            ],
            [
                'nim' => 2041720029,
                'nama' => 'Venny Meida',
                'tanggal_lahir' => '2001-10-22',
                'jenis_kelamin' => 'Perempuan',
                'jurusan' => 'Teknologi Informasi',
                'alamat' => 'Kediri',
                'email' => 'venny@gmail.com',
                'foto' => '',
                'kelas_id' => '4',
            ],
            [
                'nim' => 2041720030,
                'nama' => 'Rahma Nur',
                'tanggal_lahir' => '2001-12-08',
                'jenis_kelamin' => 'Perempuan',
                'jurusan' => 'Teknologi Informasi',
                'alamat' => 'Tulungagung',
                'email' => 'rahma@gmail.com',
                'foto' => '',
                'kelas_id' => '4',
            ],
        ];

        DB::table('mahasiswa')->insert($datas);
    }
}
