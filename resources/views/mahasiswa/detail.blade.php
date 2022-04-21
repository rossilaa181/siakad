@extends('mahasiswa.layout')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header"> Detail Mahasiswa</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Nim: </b>{{ $Mahasiswa->nim }}</li>
                        <li class="list-group-item"><b>Nama: </b>{{ $Mahasiswa->nama }}</li>
                        <li class="list-group-item"><b>Jenis Kelamin: </b>{{ $Mahasiswa->jenis_kelamin }}</li>
                        <li class="list-group-item"><b>Tanggal Lahir: </b>{{ $Mahasiswa->tanggal_lahir }}</li>
                        <li class="list-group-item"><b>Kelas: </b>{{ $Mahasiswa->kelas->nama_kelas }}</li>
                        <li class="list-group-item"><b>Jurusan: </b>{{ $Mahasiswa->jurusan }}</li>  
                        <li class="list-group-item"><b>E-mail: </b>{{ $Mahasiswa->email }}</li>
                        <li class="list-group-item"><b>Alamat: </b>{{ $Mahasiswa->alamat }}</li>  
                        <img style="margin: 30px 0px -20px 0px;" width="80px" src="{{ $Mahasiswa->foto==''? asset('images/default-user.png'): asset('storage/'.$Mahasiswa->foto) }}" class="rounded mx-auto d-block" alt="">                    
                    </ul>
                </div>
                <a class="btn btn-success mt-3" href="{{ route('mahasiswa.index') }}">Kembali</a>

            </div>
        </div>
    </div>
@endsection
