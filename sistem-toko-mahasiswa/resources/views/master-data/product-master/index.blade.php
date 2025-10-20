@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Produk</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Satuan</th>
                <th>Tipe</th>
                <th>infromasi</th>
                <th>Jumlah</th>
                <th>Produser</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $index => $produk)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $produk->product_name }}</td>
                <td>{{ $produk->unit }}</td>
                <td>{{ $produk->type }}</td>
                <td>{{ $produk->information }}</td>
                <td>{{ $produk->qty }}</td>
                <td>{{ $produk->producer }}</td>

                <td>
                    <a href="{{ route('products.edit', $produk->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('products.destroy', $produk->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada produk</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
