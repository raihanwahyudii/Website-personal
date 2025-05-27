<?php

namespace App\Http\Controllers;

use App\Models\Hafalan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class SantriHafalanController extends Controller
{
    // Tampilkan daftar hafalan user yang login
    public function index()
    {
        $user = Auth::user();
        $hafalans = Hafalan::where('user_id', $user->id)->get();
        return view('santri.hafalan.index', compact('hafalans'));
    }

    // Tampilkan form tambah hafalan baru
     public function create()
{
    // Ambil data surat dari API
    $response = Http::get('https://api.alquran.cloud/v1/surah');
    
    if ($response->ok()) {
        $surats = $response->json('data'); // array daftar surat
    } else {
        $surats = []; // fallback kosong jika gagal
    }

    return view('santri.hafalan.create', compact('surats'));
}

    // Simpan hafalan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'surat' => 'required|string|max:255',
            'ayat' => 'required|string|max:255',
            'tanggal_setoran' => 'required|date',
            'penerima_setoran' => 'required|string|max:255',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['status'] = 'belum disetujui'; // status default

        Hafalan::create($validated);

        return redirect()->route('santri.hafalan.index')->with('success', 'Hafalan berhasil disimpan.');
    }

    // Tampilkan form edit hafalan
    public function edit($id)
    {
        $user = Auth::user();
        $hafalan = Hafalan::where('id', $id)->where('user_id', $user->id)->firstOrFail();

        return view('santri.hafalan.edit', compact('hafalan'));
    }

    // Update data hafalan
    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'surat' => 'required|string|max:255',
            'ayat' => 'required|string|max:255',
            'tanggal_setoran' => 'required|date',
            'penerima_setoran' => 'required|string|max:255',
        ]);

        $hafalan = Hafalan::where('id', $id)->where('user_id', $user->id)->firstOrFail();

        $hafalan->update($validated);

        return redirect()->route('santri.hafalan.index')->with('success', 'Hafalan berhasil diperbarui.');
    }

    // Hapus hafalan
    public function destroy($id)
    {
        $user = Auth::user();

        $hafalan = Hafalan::where('id', $id)->where('user_id', $user->id)->firstOrFail();

        $hafalan->delete();

        return redirect()->route('santri.hafalan.index')->with('success', 'Hafalan berhasil dihapus.');
    }
}
