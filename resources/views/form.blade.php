@extends('layouts.main')
@section('title', 'Halaman Ubah Data Siswa')
@section('content')

    <div class="card">
        <div class="card-header"></div>
        <div class ="card-body">
        <form action="/update/{{ $em->id }}" method="POST" enctype="multipart/form-data">
             @csrf
             @method('PUT')
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $em->nama }}" required>
            </div>
            <div class="form-group">
                <label>Nim</label>
                <input type="number" name="nim" min="1900" max="2100" value="{{ $em->nim }}" class="form-control" placeholder="Masukan Nim" required>
            </div>
            <div class="form-group">
                <label>Prodi</label>
                <select name="prodi" class="form-control">
                    <option value="0">--Pilih Prodi--</option>
                    <option value="SI" {{ $em->prodi = "SI" ? "Selected":"" }}>SI</option>
                    <option value="Akuntansi" {{ $em->prodi = "Akuntansi" ? "Selected":"" }}>Akuntansi</option>
                    <option value="Manajemen" {{ $em->prodi = "Manajemen" ? "Selected":"" }}>Majanemen</option>
                    <option value="Arsitektur" {{ $em->prodi = "Arsitektur" ? "Selected":"" }}>Arsitektur</option>
                </select>
            </div>
            <div class="form-group">
                <label>Foto</label>
                <input type="file" accept="image/*" name="foto" class="form-control-file">
            </div>
            <div class="form-group">
                <img src="{{ asset('/storage/'.$em->foto) }}" alt="{{ $em->foto }}" height="80" width="80">
            </div>
            <div class="form-group">
                <button type="submit" class="btn-primary">Simpan</button>
            </div>
        </div>
        </form>
        </div>
    
@endsection
