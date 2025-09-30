<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Satuan;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::with('satuan')->get();
        return view('barang.index', compact('barang'));
    }

    public function create()
    {
        $satuan = Satuan::all();
        return view('barang.create', compact('satuan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'jenis' => 'required|in:O,B', // Obat, Barang lain
            'harga' => 'required|integer',
            'idsatuan' => 'required|exists:satuan,idsatuan',
        ]);

        Barang::create($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $satuan = Satuan::all();
        return view('barang.edit', compact('barang', 'satuan'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:100',
            'jenis' => 'required|in:O,B',
            'harga' => 'required|integer',
            'idsatuan' => 'required|exists:satuan,idsatuan',
        ]);

        $barang->update($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus');
    }
}
