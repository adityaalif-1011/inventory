@extends('layouts.app')

@section('title', 'Data Penjualan')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Daftar Penjualan</h4>
        <a href="{{ route('penjualan.create') }}" class="btn btn-primary btn-sm">+ Tambah Penjualan</a>
    </div>

    <div class="card-body">
        @if(isset($penjualan) && $penjualan->count() > 0)
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID Penjualan</th>
                        <th>Tanggal</th>
                        <th>Nama Pelanggan</th>
                        <th>Subtotal</th>
                        <th>PPN</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penjualan as $item)
                        <tr>
                            <td>{{ $item->idpenjualan }}</td>
                            <td>{{ $item->tanggal ?? $item->created_at }}</td>
                            <td>{{ $item->nama_pelanggan ?? '-' }}</td>
                            <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($item->ppn, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($item->subtotal + $item->ppn, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('penjualan.show', $item->idpenjualan) }}" class="btn btn-info btn-sm">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-warning">Belum ada data penjualan.</div>
        @endif
    </div>
</div>
@endsection
