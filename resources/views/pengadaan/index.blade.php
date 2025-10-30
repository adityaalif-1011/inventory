@extends('layouts.app')
@section('content')
<div class="container">
  <h3>Pengadaan</h3>
  <form class="mb-2" method="get">
    <input name="q" value="{{ $q ?? '' }}" placeholder="Cari vendor / user" class="form-control" style="max-width:400px;display:inline-block">
    <button class="btn btn-sm btn-primary">Cari</button>
    <a class="btn btn-sm btn-success" href="{{ route('pengadaan.create') }}">Buat Pengadaan</a>
  </form>

  @include('partials.alerts')

  <table class="table table-sm">
    <thead><tr><th>ID</th><th>Tgl</th><th>Vendor</th><th>Subtotal</th><th>PPN</th><th>Total</th><th>Status</th><th>Aksi</th></tr></thead>
    <tbody>
      @foreach($pengadaans as $p)
      <tr>
        <td>{{ $p->idpengadaan }}</td>
        <td>{{ $p->timestamp ?? $p->created_at }}</td>
        <td>{{ $p->nama_vendor }}</td>
        <td>{{ number_format($p->subtotal_nilai,0,',','.') }}</td>
        <td>{{ $p->ppn }}</td>
        <td>{{ number_format($p->total_nilai,0,',','.') }}</td>
        <td>{{ $p->status }}</td>
        <td><a class="btn btn-sm btn-info" href="{{ route('pengadaan.show',$p->idpengadaan) }}">View</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>

  {{ $pengadaans->links() }}
</div>
@endsection

