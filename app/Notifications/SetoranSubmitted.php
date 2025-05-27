<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setoran;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SetoranSubmitted;

class SetoranController extends Controller
{
    public function index()
    {
        $setorans = Setoran::with(['user', 'penerima'])->latest()->get();
        return view('ustad.setoran.index', compact('setorans'));
    }

    public function create()
    {
        $users = User::where('role', 'santri')->get();
        $ustadzList = User::where('role', 'ustad')->get();
        $suratList = $this->getSuratList();

        return view('ustad.setoran.create', compact('users', 'ustadzList', 'suratList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'penerima_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'surat' => 'required|numeric',
            'ayat_start' => 'required|integer|min:1',
            'ayat_end' => 'required|integer|gte:ayat_start',
            'catatan' => 'nullable|string',
        ]);

        $hafalan = 'Surat nomor ' . $request->surat . ', ayat ' . $request->ayat_start . '-' . $request->ayat_end;
        if ($request->catatan) {
            $hafalan .= '. Catatan: ' . $request->catatan;
        }

        $setoran = Setoran::create([
            'user_id' => $request->user_id,
            'penerima_id' => $request->penerima_id,
            'tanggal' => $request->tanggal,
            'surat' => $request->surat,
            'ayat_start' => $request->ayat_start,
            'ayat_end' => $request->ayat_end,
            'catatan' => $request->catatan,
            'hafalan' => $hafalan,
        ]);

        // === Kirim Notifikasi ke Musyrifah / PS ===
        $musyrifahList = User::where('role', 'musyrifah')->get();
        Notification::send($musyrifahList, new SetoranSubmitted($setoran));

        // === Kirim Notifikasi ke Orang Tua (jika ada parent_email) ===
        $santri = User::find($request->user_id);
        if ($santri && $santri->parent_email) {
            Notification::route('mail', $santri->parent_email)
                ->notify(new SetoranSubmitted($setoran));
        }

        return redirect()->route('setoran.index')->with('success', 'Setoran berhasil disimpan.');
    }

    public function show($id)
    {
        $setoran = Setoran::with(['user', 'penerima'])->findOrFail($id);
        return view('ustad.setoran.show', compact('setoran'));
    }

    public function edit($id)
    {
        $setoran = Setoran::findOrFail($id);
        $users = User::where('role', 'santri')->get();
        $ustadzList = User::where('role', 'ustad')->get();
        $suratList = $this->getSuratList();

        return view('ustad.setoran.edit', compact('setoran', 'users', 'ustadzList', 'suratList'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'penerima_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'surat' => 'required|numeric',
            'ayat_start' => 'required|integer|min:1',
            'ayat_end' => 'required|integer|gte:ayat_start',
            'catatan' => 'nullable|string',
        ]);

        $setoran = Setoran::findOrFail($id);

        $hafalan = 'Surat nomor ' . $request->surat . ', ayat ' . $request->ayat_start . '-' . $request->ayat_end;
        if ($request->catatan) {
            $hafalan .= '. Catatan: ' . $request->catatan;
        }

        $setoran->update([
            'user_id' => $request->user_id,
            'penerima_id' => $request->penerima_id,
            'tanggal' => $request->tanggal,
            'surat' => $request->surat,
            'ayat_start' => $request->ayat_start,
            'ayat_end' => $request->ayat_end,
            'catatan' => $request->catatan,
            'hafalan' => $hafalan,
        ]);

        return redirect()->route('setoran.index')->with('success', 'Setoran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $setoran = Setoran::findOrFail($id);
        $setoran->delete();

        return redirect()->route('setoran.index')->with('success', 'Setoran berhasil dihapus.');
    }

    private function getSuratList()
    {
        $response = Http::get('https://api.alquran.cloud/v1/surah');

        if (!$response->successful()) {
            return collect([]);
        }

        return collect($response['data'])->map(fn($item) => [
            'number' => $item['number'],
            'name' => $item['name'],
            'name_translated' => $item['englishName'],
        ]);
    }
}
