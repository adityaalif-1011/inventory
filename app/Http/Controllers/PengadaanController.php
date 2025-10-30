<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengadaanController extends Controller
{
    public function index(Request $req)
    {
        $q = $req->query('q');
        $query = DB::table('view_pengadaan')->orderBy('created_at','desc');
        if ($q) $query->where('nama_vendor','like', "%{$q}%")->orWhere('nama_user','like', "%{$q}%");
        $pengadaans = $query->paginate(15)->withQueryString();
        return view('pengadaan.index', compact('pengadaans','q'));
    }

    public function show($id)
    {
        $header = DB::table('view_pengadaan')->where('idpengadaan', $id)->first();
        $details = DB::table('view_pengadaan_detail')->where('idpengadaan', $id)->get();
        if (!$header) return redirect()->route('pengadaan.index')->with('error','Pengadaan tidak ditemukan');
        return view('pengadaan.show', compact('header','details'));
    }

    // form create (ambil daftar barang & vendor)
    public function create()
    {
        $barangs = DB::table('barang')->select('idbarang','nama')->get();
        $vendors = DB::table('vendor')->select('idvendor','nama_vendor')->get();
        return view('pengadaan.create', compact('barangs','vendors'));
    }

    // store -> panggil stored procedure sp_create_pengadaan (expects JSON items)
    public function store(Request $req)
    {
        $req->validate([
            'vendor' => 'required|integer',
            'ppn' => 'required|numeric',
            'items' => 'required|array|min:1',
            'items.*.idbarang' => 'required|integer',
            'items.*.harga_satuan' => 'required|numeric',
            'items.*.jumlah' => 'required|integer|min:1',
        ]);

        $itemsJson = json_encode($req->items);
        $iduser = auth()->id() ?? 1;

        try {
            $res = DB::select('CALL sp_create_pengadaan(?, ?, ?, ?)', [
                $iduser,
                $req->vendor,
                $req->ppn,
                $itemsJson
            ]);
            $idpengadaan = $res[0]->idpengadaan ?? null;
            return redirect()->route('pengadaan.show', $idpengadaan)->with('success','Pengadaan berhasil dibuat');
        } catch (\Exception $e) {
            return back()->withInput()->with('error','Gagal membuat pengadaan: '.$e->getMessage());
        }
    }
}
