@extends('layouts.main')
@section ('title', 'Halaman Data Siswa')
@section('content')

    <div class="card">
        <div class="card-header"></div>
        <div class ="card-body">
        <form action="/save" method="POST" enctype="multipart/form-data">
             @csrf
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required>
            </div>

            <div class="form-group">
            <label>Prodi</label>
            <select name="prodi" class="form-control">
            <option value="0">--Pilih Prodi--</option>
            <option value="SI" {{ $em->prodi == "SI" ? "selected":"" }}>SI</option>
            <option value="Akuntansi" {{ $em->prodi == "Akuntansi" ? "selected":"" }}>Akuntansi</option>
            <option value="Manajemen" {{ $em->prodi == "Manajemen" ? "selected":"" }}>Majanemen</option>
            <option value="Arsitektur" {{ $em->prodi == "Arsitektur" ? "selected":"" }}>Arsitektur</option>
             </select>
            </div>

            <div class="form-group">
                <label>Nim</label>
                <input type="number" name="nim" min="1900" max="2100" class="form-control" placeholder="Masukan Nim" required>
            </div>
            <div class="form-group">
                <label>Foto</label>
                <input type="file" accept="image/*" name="foto" class="form-control-file">
            </div>
            <div class="form-grup">
                <button type="submit" class="btn-primary">Simpan</button>
            </div>
        </div>
        </form>
        </div>
    
@endsection