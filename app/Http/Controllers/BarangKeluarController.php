<?php

// app/Http/Controllers/BarangKeluarController.php
namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangKeluars = BarangKeluar::all();
        return view('barang_keluars.index', compact('barangKeluars'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('barang_keluars.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer',
            'tanggal' => 'required|date',
        ]);

        // Create new BarangKeluar
        $barangKeluar = BarangKeluar::create($request->all());

        // Update stock in Barang
        $barang = Barang::find($request->barang_id);
        $barang->stok -= $request->jumlah;
        $barang->save();

        return redirect()->route('barang_keluars.index')->with('success', 'Barang Keluar created successfully.');
    }

    public function show(BarangKeluar $barangKeluar)
    {
        return view('barang_keluars.show', compact('barangKeluar'));
    }

    public function edit(BarangKeluar $barangKeluar)
    {
        $barangs = Barang::all();
        return view('barang_keluars.edit', compact('barangKeluar', 'barangs'));
    }

    public function update(Request $request, BarangKeluar $barangKeluar)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer',
            'tanggal' => 'required|date',
        ]);

        // Update stock in Barang (add old amount, subtract new amount)
        $oldJumlah = $barangKeluar->jumlah;
        $barang = Barang::find($request->barang_id);
        $barang->stok += $oldJumlah;
        $barang->stok -= $request->jumlah;
        $barang->save();

        // Update BarangKeluar
        $barangKeluar->update($request->all());

        return redirect()->route('barang_keluars.index')->with('success', 'Barang Keluar updated successfully.');
    }

    public function destroy(BarangKeluar $barangKeluar)
    {
        // Update stock in Barang (add the amount being deleted)
        $barang = Barang::find($barangKeluar->barang_id);
        $barang->stok += $barangKeluar->jumlah;
        $barang->save();

        // Delete BarangKeluar
        $barangKeluar->delete();

        return redirect()->route('barang_keluars.index')->with('success', 'Barang Keluar deleted successfully.');
    }
}
?>
