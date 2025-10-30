@extends('layouts.app')

@section('title', 'Data Penerimaan')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Daftar Penerimaan</h4>
        <a href="{{ route('penerimaan.create') }}" class="btn btn-primary btn-sm">+ Tambah Penerimaan</a>
    </div>
    <div class="card-body">
        @if(isset($penerimaan) && $penerimaan->count() > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Supplier</th>
                        <th>Total Barang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penerimaan as $item)
                        <tr>
                            <td>{{ $item->id_penerimaan }}</td>
                            <td>{{ $item->tanggal_penerimaan }}</td>
                            <td>{{ $item->nama_supplier ?? '-' }}</td>
                            <td>{{ $item->total_barang ?? 0 }}</td>
                            <td>
                                <a href="{{ route('penerimaan.show', $item->id_penerimaan) }}" class="btn btn-info btn-sm">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-warning">Belum ada data penerimaan.</div>
        @endif
    </div>
</div>
@endsection
