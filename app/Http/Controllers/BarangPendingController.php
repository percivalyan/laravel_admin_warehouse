<?php

// app/Http/Controllers/BarangPendingController.php
namespace App\Http\Controllers;

use App\Models\BarangPending;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangPendingController extends Controller
{
    public function index()
    {
        $barangPendings = BarangPending::all();
        return view('barang_pendings.index', compact('barangPendings'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('barang_pendings.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer',
            'tanggal' => 'required|date',
        ]);

        BarangPending::create($request->all());
        return redirect()->route('barang_pendings.index')->with('success', 'Barang Pending created successfully.');
    }

    public function show(BarangPending $barangPending)
    {
        return view('barang_pendings.show', compact('barangPending'));
    }

    public function edit(BarangPending $barangPending)
    {
        $barangs = Barang::all();
        return view('barang_pendings.edit', compact('barangPending', 'barangs'));
    }

    public function update(Request $request, BarangPending $barangPending)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer',
            'tanggal' => 'required|date',
        ]);

        $barangPending->update($request->all());
        return redirect()->route('barang_pendings.index')->with('success', 'Barang Pending updated successfully.');
    }

    public function destroy(BarangPending $barangPending)
    {
        $barangPending->delete();
        return redirect()->route('barang_pendings.index')->with('success', 'Barang Pending deleted successfully.');
    }
}

