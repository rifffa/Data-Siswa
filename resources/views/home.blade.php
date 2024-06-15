@extends('layouts.main')
@section ('title', 'Halaman Home')
@section('content')
    <h1>HALAMAN HOME</h1>
    {{Auth::user()->name}}
@endsection