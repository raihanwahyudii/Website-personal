<?php

namespace App\Http\Controllers;

use App\Models\Hafalan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class SantriHafalanController extends Controller
{
    public function index()
    {
        $hafalans = Hafalan::where('user_id', Auth::id())->get();
        return view('santri.hafalan.index', compact('hafalans'));
    }

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

    public function store(Request $request)
    {
        $request->validate([
            'surat' => 'required|string',
            'ayat' => [
                'required',
                'regex:/^\d+\s*(?:-|sampai)\s*\d+$/i'
            ],
            'tanggal_setoran' => 'required|date',
            'penerima_setoran' => 'required|string|max:255',
        ], [
            'ayat.regex' => 'Format ayat harus berupa rentang, contoh: "1-5" atau "1 sampai 5".',
        ]);

        Hafalan::create([
            'user_id' => Auth::id(),
            'surat' => $request->surat,
            'ayat' => $request->ayat,
            'tanggal_setoran' => $request->tanggal_setoran,
            'penerima_setoran' => $request->penerima_setoran,
            'status' => 'belum disetujui',
        ]);

        return redirect()->route('santri.hafalan.index')->with('success', 'Hafalan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $hafalan = Hafalan::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('santri.hafalan.edit', compact('hafalan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'surat' => 'required|string',
            'ayat' => [
                'required',
                'regex:/^\d+\s*(?:-|sampai)\s*\d+$/i'
            ],
            'tanggal_setoran' => 'required|date',
            'penerima_setoran' => 'required|string|max:255',
        ], [
            'ayat.regex' => 'Format ayat harus berupa rentang, contoh: "1-5" atau "1 sampai 5".',
        ]);

        $hafalan = Hafalan::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $hafalan->update($request->only('surat', 'ayat', 'tanggal_setoran', 'penerima_setoran'));

        return redirect()->route('santri.hafalan.index')->with('success', 'Hafalan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $hafalan = Hafalan::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $hafalan->delete();

        return redirect()->route('santri.hafalan.index')->with('success', 'Hafalan berhasil dihapus.');
    }
}
