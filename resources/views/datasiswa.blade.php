@extends('layouts.main')
@section('title', 'Halaman Tambah Data Siswa')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="/datasiswa/add" class="btn btn-primary">Tambah Data</a>
        </div>
        <div class="card-body">
        @if (session('alert'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session('alert') }}</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
            </div>
        @endif
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Nim</th>
                <th>Prodi</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mv as $idx => $m)
            <tr>
                <td>{{ $idx + 1 }}</td>
                <td>{{ $m->nama }}</td>
                <td>{{ $m->nim }}</td>
                <td>{{ $m->prodi }}</td>
                <td>
                    <img src="{{ asset('/storage/'.$m->foto) }}" alt="{{ $m->foto }}" height="80" width="80">
                </td>
                <td>
                    <a href="/datasiswa/edit/{{ $m->id }}" class="btn btn-success">Edit</i></a>
                    <a href="/delete/{{ $m->id }}" class="btn btn-danger">Delete</i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        </div>
        {{--DATATABLES DISINI--}}

    </div>
@endsection