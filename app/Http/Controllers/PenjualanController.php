<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function index(Request $req)
    {
        $q = $req->query('q');
        $query = DB::table('view_penjualan')->orderBy('tanggal_penjualan','desc');
        if ($q) $query->where('nama_penjual','like', "%{$q}%")->orWhere('nama_barang','like', "%{$q}%");
        $penjualans = $query->paginate(15)->withQueryString();
        return view('penjualan.index', compact('penjualans','q'));
    }

    public function show($id)
    {
        $header = DB::table('penjualan')->where('idpenjualan', $id)->first();
        $details = DB::table('view_penjualan')->where('idpenjualan', $id)->get();
        if (!$header) return redirect()->route('penjualan.index')->with('error','Penjualan tidak ditemukan');
        return view('penjualan.show', compact('header','details'));
    }

    public function create()
    {
        $barangs = DB::table('barang')->select('idbarang','nama','harga')->get();
        return view('penjualan.create', compact('barangs'));
    }

    public function store(Request $req)
    {
        $req->validate([
            'ppn' => 'required|numeric',
            'items' => 'required|array|min:1',
            'items.*.idbarang' => 'required|integer',
            'items.*.harga_satuan' => 'required|numeric',
            'items.*.jumlah' => 'required|integer|min:1',
        ]);

        $itemsJson = json_encode($req->items);
        $iduser = auth()->id() ?? 1;

        try {
            $res = DB::select('CALL sp_create_penjualan(?, ?, ?, ?)', [
                $iduser,
                $req->idmargin ?? null,
                $req->ppn,
                $itemsJson
            ]);
            $idpenjualan = $res[0]->idpenjualan ?? null;
            return redirect()->route('penjualan.show', $idpenjualan)->with('success','Penjualan berhasil dibuat');
        } catch (\Exception $e) {
            return back()->withInput()->with('error','Gagal membuat penjualan: '.$e->getMessage());
        }
    }
}
