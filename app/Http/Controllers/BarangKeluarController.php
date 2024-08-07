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

        BarangKeluar::create($request->all());
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

        $barangKeluar->update($request->all());
        return redirect()->route('barang_keluars.index')->with('success', 'Barang Keluar updated successfully.');
    }

    public function destroy(BarangKeluar $barangKeluar)
    {
        $barangKeluar->delete();
        return redirect()->route('barang_keluars.index')->with('success', 'Barang Keluar deleted successfully.');
    }
}
