@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Barang</h2>

    {{-- Tampilkan error validasi kalau ada --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form tambah barang --}}
    <form action="{{ route('barang.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>

        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis Barang</label>
            <select name="jenis" id="jenis" class="form-control" required>
                <option value="O">Obat</option>
                <option value="B">Barang lain</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" value="{{ old('harga') }}" required>
        </div>

        <div class="mb-3">
            <label for="idsatuan" class="form-label">Satuan</label>
            <select name="idsatuan" id="idsatuan" class="form-control" required>
                @foreach($satuan as $s)
                    <option value="{{ $s->idsatuan }}">{{ $s->nama_satuan }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
