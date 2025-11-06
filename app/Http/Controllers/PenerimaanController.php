<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenerimaanController extends Controller
{
    public function index(Request $req)
    {
        $penerimaans = DB::table('view_penerimaan')
    ->orderBy('tanggal_terima', 'desc')
    ->get();

        return view('penerimaan.index', compact('penerimaans'));
        // $q = $req->query('q');
        // $query = DB::table('view_penerimaan')->orderBy('tanggal_terima','desc');
        // if ($q) $query->where('nama_vendor','like', "%{$q}%")->orWhere('nama_penerima','like', "%{$q}%");
        // $penerimaans = $query->paginate(15)->withQueryString();
        // return view('penerimaan.index', compact('penerimaans','q'));
    }

    public function show($id)
    {
        $header = DB::table('penerimaan')->where('idpenerimaan', $id)->first();
        $details = DB::table('view_penerimaan')->where('idpenerimaan', $id)->get();
        if (!$header) return redirect()->route('penerimaan.index')->with('error','Penerimaan tidak ditemukan');
        return view('penerimaan.show', compact('header','details'));
    }

    public function create()
    {
        $pengadaans = DB::table('pengadaan')->whereIn('status',['created','approved'])->get();
        return view('penerimaan.create', compact('pengadaans'));
    }

    public function store(Request $req)
    {
        $req->validate([
            'idpengadaan' => 'required|integer',
            'items' => 'required|array|min:1',
            'items.*.idbarang' => 'required|integer',
            'items.*.harga_satuan_terima' => 'required|numeric',
            'items.*.jumlah_terima' => 'required|integer|min:1',
        ]);

        $itemsJson = json_encode($req->items);
$iduser = optional(auth()->user())->id ?? 1;


        try {
            $res = DB::select('CALL sp_receive_penerimaan(?, ?, ?)', [
                $req->idpengadaan,
                $iduser,
                $itemsJson
            ]);
            $idpenerimaan = $res[0]->idpenerimaan ?? null;
            return redirect()->route('penerimaan.show', $idpenerimaan)->with('success','Penerimaan berhasil diproses');
        } catch (\Exception $e) {
            return back()->withInput()->with('error','Gagal proses penerimaan: '.$e->getMessage());
        }
    }
}
