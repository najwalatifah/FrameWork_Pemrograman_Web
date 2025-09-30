@extends('layouts.app')

@section('title', 'Halaman produk')

@section('content')

    <h1>ini adalah halaman produk</h1>
    <h1>selamat datang {{ $nama }}</h1>

    <div class="alert alert-{{ $alertType }}">
        {{ $alertMessage}}
    </div>

@endsection