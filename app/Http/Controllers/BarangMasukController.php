<?php

// app/Http/Controllers/BarangMasukController.php
namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barangMasuks = BarangMasuk::all();
        return view('barang_masuks.index', compact('barangMasuks'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('barang_masuks.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer',
            'tanggal' => 'required|date',
        ]);

        // Create new BarangMasuk
        $barangMasuk = BarangMasuk::create($request->all());

        // Update stock in Barang
        $barang = Barang::find($request->barang_id);
        $barang->stok += $request->jumlah;
        $barang->save();

        return redirect()->route('barang_masuks.index')->with('success', 'Barang Masuk created successfully.');
    }

    public function show(BarangMasuk $barangMasuk)
    {
        return view('barang_masuks.show', compact('barangMasuk'));
    }

    public function edit(BarangMasuk $barangMasuk)
    {
        $barangs = Barang::all();
        return view('barang_masuks.edit', compact('barangMasuk', 'barangs'));
    }

    public function update(Request $request, BarangMasuk $barangMasuk)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer',
            'tanggal' => 'required|date',
        ]);

        // Update stock in Barang (subtract old amount, add new amount)
        $oldJumlah = $barangMasuk->jumlah;
        $barang = Barang::find($request->barang_id);
        $barang->stok -= $oldJumlah;
        $barang->stok += $request->jumlah;
        $barang->save();

        // Update BarangMasuk
        $barangMasuk->update($request->all());

        return redirect()->route('barang_masuks.index')->with('success', 'Barang Masuk updated successfully.');
    }

    public function destroy(BarangMasuk $barangMasuk)
    {
        // Update stock in Barang (subtract the amount being deleted)
        $barang = Barang::find($barangMasuk->barang_id);
        $barang->stok -= $barangMasuk->jumlah;
        $barang->save();

        // Delete BarangMasuk
        $barangMasuk->delete();

        return redirect()->route('barang_masuks.index')->with('success', 'Barang Masuk deleted successfully.');
    }
}
?>
