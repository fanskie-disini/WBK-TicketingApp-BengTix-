<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    // Menampilkan Tabel Lokasi
    public function index()
    {
        $lokasis = Lokasi::all();
        return view('admin.lokasi.index', compact('lokasis'));
    }

    // Menyimpan Lokasi Baru
    public function store(Request $request)
    {
        $request->validate(['nama_lokasi' => 'required|max:255']);
        // Hanya ambil field 'nama_lokasi', abaikan '_token'
        Lokasi::create($request->only('nama_lokasi')); 
        return redirect()->back()->with('success', 'Lokasi berhasil ditambah');
    }

    // Update data lokasi
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lokasi' => 'required|max:255'
        ]);

        $lokasi = Lokasi::findOrFail($id);
        $lokasi->update($request->only('nama_lokasi'));

        return redirect()->back()->with('success', 'Lokasi berhasil diperbarui');
    }
    
    // Menghapus Lokasi
    public function destroy(Lokasi $lokasi)
    {
        $lokasi->delete();
        return redirect()->back()->with('success', 'Lokasi berhasil dihapus');
    }

}
