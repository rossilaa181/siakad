@extends('mahasiswa.layout')

@section('content')
<div class="container mt-3">
    <div class="text-center">
        <center>
            <h5>JURUSAN TEKNOLOGI INFORMASI</h5>
            <h5>POLITEKNIK NEGERI MALANG</h5>
            <hr style="border: 3px solid green; border-radius: 5px;">
        </center>
        
    </div>
    <h2 class="text-center mt-4 mb-5">KARTU HASIL STUDI (KHS)</h2>
    <strong>Name: </strong> {{$khs->mahasiswa->nama}}<br>
    <strong>NIM: </strong> {{$khs->mahasiswa->nim}}<br>
    <strong>Class: </strong> {{$khs->mahasiswa->kelas->nama_kelas}}<br><br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Mata Kuliah</th>
                <th scope="col">SKS</th>
                <th scope="col">Semester</th>
                <th scope="col">Nilai Angka</th>
                <th scope="col">Nilai Huruf</th>
            </tr>
        </thead>
        <tbody>
            @foreach($khs as $mk)
            <tr>
                <td>{{$mk->matakuliah->nama_matkul}}</td>
                <td>{{$mk->matakuliah->sks}}</td>
                <td>{{$mk->matakuliah->semester}}</td>
                <td>{{$mk->nilai_angka}}</td>
                <td>{{$mk->nilai_huruf}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection