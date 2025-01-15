<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SekolahData;

class SekolahDataController extends Controller
{
    public function index()
    {
        // Ambil semua data dari tabel SekolahData
        $sekolahData = SekolahData::all();

        // Kirim data ke view dashboard.sekolahdata.index
        return view('dashboard.sekolahdata.index', compact('sekolahData'));
    }

    public function edit($id)
    {
        // Cari data berdasarkan ID
        $data = SekolahData::findOrFail($id);

        // Kirim data ke view edit
        return view('dashboard.sekolahdata.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'kategori' => 'required|string|max:255',
            'jumlah' => 'required|integer',
        ]);

        // Temukan data berdasarkan ID dan perbarui
        $data = SekolahData::findOrFail($id);
        $data->update([
            'kategori' => $request->kategori,
            'jumlah' => $request->jumlah,
        ]);

        // Redirect kembali ke index dengan pesan sukses
        return redirect()->route('dashboard.sekolahdata.index')->with('success', 'Data berhasil diperbarui');
    }



    // Tambahkan metode lainnya di bawah ini
}
