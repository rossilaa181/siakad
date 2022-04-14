<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\MataKuliah;
use App\Models\Mahasiswa_MataKuliah;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{

    public function index()
    {        
        //condition use search fiture
        if (request('search')) {
            $mahasiswas = Mahasiswa::where('Nim', 'LIKE', '%' . request('search') . '%')
                ->orWhere('Nama', 'LIKE', '%' . request('search') . '%')
                // ->orWhere('Kelas', 'LIKE', '%' . request('search') . '%')
                ->orWhere('Jurusan', 'LIKE', '%' . request('search') . '%')
                ->orWhere('Jenis_Kelamin', 'LIKE', '%' . request('search') . '%')
                ->orWhere('Email', 'LIKE', '%' . request('search') . '%')
                ->orWhere('Alamat', 'LIKE', '%' . request('search') . '%')
                ->orWhere('Tanggal_Lahir', 'LIKE', '%' . request('search') . '%')
                ->orWhereHas('kelas', function ($query) {
                    $query->where('nama_kelas', 'like', '%' . request('search') . '%');
                })->with('kelas')
                ->paginate(5);

            return view('mahasiswa.index', ['paginate' => $mahasiswas]);
        } else {
            // fungsi menampilkan data dengan menggunkan eloquent
            // $mahasiswa = Mahasiswa::all(); // Mengambil semua isi tabel

            //yang semula Mahasiswa::all, diubah menjadi with() yang menyatakan relasi
            $mahasiswa = Mahasiswa::with('kelas')->get();
            $paginate = Mahasiswa::orderBy('id_mahasiswa', 'asc')->Paginate(5);
            return view('mahasiswa.index', ['mahasiswa' => $mahasiswa, 'paginate' => $paginate]);
        }
    }

    public function create()
    {        
        $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
        return view('mahasiswa.create', ['kelas' => $kelas]);
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'Jenis_Kelamin' => 'required',
            'Email' => 'required',
            'Alamat' => 'required',
            'Tanggal_Lahir' => 'required',
        ]);

        $mahasiswa = new Mahasiswa;
        $mahasiswa->nim = $request->get('Nim');
        $mahasiswa->nama = $request->get('Nama');
        $mahasiswa->jurusan = $request->get('Jurusan');
        $mahasiswa->jenis_kelamin = $request->get('Jenis_Kelamin');
        $mahasiswa->email = $request->get('Email');
        $mahasiswa->alamat = $request->get('Alamat');
        $mahasiswa->tanggal_lahir = $request->get('Tanggal_Lahir');
        // $mahasiswa->save(); // jika dilakukan save diawal maka data id kelas tidak dapat dilakukan penyimpanan
                                // kedalam database, sehingga pemanggilan method save() diakhir
                                // ketika telah dilakukan proses inisialisasi FG kelas_id

        // $kelas = Kelas::find($request->get('Kelas'));
        $kelas = new Kelas;
        $kelas->id = $request->get('Kelas');
        
        //fungsi eloquent untuk menambah data dengan realasi belongsTo
        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    public function show($Nim)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        // $Mahasiswa = Mahasiswa::where('nim', $nim)->first();
        // return view('mahasiswa.detail', compact('Mahasiswa'));

        //code sebelum dibuat reelasi --> $mahasiswa = Mahasiswa::find($Nim);
        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $Nim)->first();

        return view('mahasiswa.detail', ['Mahasiswa' => $mahasiswa]);
    }


    public function edit($nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        //kode sebelum ditambahkan relasi
        //$Mahasiswa = DB::table('mahasiswa')->where('nim', $nim)->first();
        //return view('mahasiswa.edit', compact('Mahasiswa'));

        $mahasiswa = Mahasiswa::with('kelas')->where('nim',$nim)->first();
        $kelas = Kelas::all();
        return view('mahasiswa.edit', compact('mahasiswa','kelas'));
    }


    public function update(Request $request, $nim)
    {
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'Jenis_Kelamin' => 'required',
            'Email' => 'required',
            'Alamat' => 'required',
            'Tanggal_Lahir' => 'required',
        ]);

        //kode sebelum di buat relasi
        //fungsi eloquent untuk mengupdate data inputan kita
        // Mahasiswa::where('nim', $nim)
        //     ->update([
        //         'nim' => $request->Nim,
        //         'nama' => $request->Nama,
        //         'kelas' => $request->Kelas,
        //         'jurusan' => $request->Jurusan,
        //         'jenis_kelamin' => $request->Jenis_Kelamin,
        //         'email' => $request->Email,
        //         'alamat' => $request->Alamat,
        //         'tanggal_lahir' => $request->Tanggal_Lahir,
        //     ]);

        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
        $mahasiswa->nim = $request->get('Nim');
        $mahasiswa->nama = $request->get('Nama');
        $mahasiswa->jurusan = $request->get('Jurusan');
        $mahasiswa->jenis_kelamin = $request->get('Jenis_Kelamin');
        $mahasiswa->email = $request->get('Email');
        $mahasiswa->alamat = $request->get('Alamat');
        $mahasiswa->tanggal_lahir = $request->get('Tanggal_Lahir');
        // $mahasiswa->save(); // jika dilakukan save diawal maka data id kelas tidak dapat dilakukan penyimpanan
                                // kedalam database, sehingga pemanggilan method save() diakhir
                                // ketika telah dilakukan proses inisialisasi FG kelas_id

        // $kelas = Kelas::find($request->get('Kelas'));
        $kelas = new Kelas;
        $kelas->id = $request->get('Kelas');
        
        //fungsi eloquent untuk mengupdate data dengan realasi belongsTo
        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();


        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    public function destroy($nim)
    {
        //fungsi eloquent untuk menghapus data
        Mahasiswa::where('nim', $nim)->delete();
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Dihapus');
    }

    //menampilkan halaman KHS
    public function khs($id)
    {

        $khs = Mahasiswa_MataKuliah::where('mahasiswa_id', $id)
            ->with('mahasiswa', 'matakuliah')->get();
        $mhs = Mahasiswa::with('kelas')->where('id_mahasiswa', $id)->first();

        return view('mahasiswa.khs', compact('khs', 'mhs'));
    }
}
