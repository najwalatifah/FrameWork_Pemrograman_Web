{{-- @extends('layouts.app')

@section('title', 'Halaman produk')

@section('content')

    <h1>ini adalah halaman produk</h1>
    <h1>selamat datang {{ $nama }}</h1>

    <div class="alert alert-{{ $alertType }}">
        {{ $alertMessage}}
    </div>

@endsection --}}

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">

    <h1>Halaman Produk</h1>

    {{-- Komponen Alert --}}
    <x-alert :type="$type">
        {{ $message }}
    </x-alert>

</body>
</html>
