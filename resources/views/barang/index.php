@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Barang</h2>
    <a href="{{ route('barang.create') }}" class="btn btn-primary mb-3">Tambah Barang</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Harga</th>
                <th>Satuan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barang as $b)
            <tr>
                <td>{{ $b->idbarang }}</td>
                <td>{{ $b->nama }}</td>
                <td>{{ $b->jenis }}</td>
                <td>{{ number_format($b->harga) }}</td>
                <td>{{ $b->satuan->nama_satuan ?? '-' }}</td>
                <td>
                    <a href="{{ route('barang.edit', $b->idbarang) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('barang.destroy', $b->idbarang) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
