@extends('layouts.app')
@section('content')
<div class="container">
  <h3>Pengadaan #{{ $header->idpengadaan }}</h3>
  <div class="mb-3">
    <strong>Vendor:</strong> {{ $header->nama_vendor }} |
    <strong>User:</strong> {{ $header->nama_user }} |
    <strong>Status:</strong> {{ $header->status }}
  </div>

  <table class="table table-sm">
    <thead><tr><th>Barang</th><th>Harga</th><th>Jumlah</th><th>Subtotal</th></tr></thead>
    <tbody>
      @foreach($details as $d)
      <tr>
        <td>{{ $d->nama_barang }}</td>
        <td>{{ number_format($d->harga_satuan,0,',','.') }}</td>
        <td>{{ $d->jumlah }}</td>
        <td>{{ number_format($d->sub_total,0,',','.') }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <a href="{{ route('pengadaan.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
