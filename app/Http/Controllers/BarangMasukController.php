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

        BarangMasuk::create($request->all());
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

        $barangMasuk->update($request->all());
        return redirect()->route('barang_masuks.index')->with('success', 'Barang Masuk updated successfully.');
    }

    public function destroy(BarangMasuk $barangMasuk)
    {
        $barangMasuk->delete();
        return redirect()->route('barang_masuks.index')->with('success', 'Barang Masuk deleted successfully.');
    }
}

