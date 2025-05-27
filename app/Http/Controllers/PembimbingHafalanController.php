<?php

namespace App\Http\Controllers;

use App\Models\Hafalan;
use Illuminate\Http\Request;

class PembimbingHafalanController extends Controller
{
    public function index()
    {
        $hafalans = Hafalan::with('user')->get();
        return view('pembimbing.hafalan.index', compact('hafalans'));
    }

    public function edit($id)
    {
        $hafalan = Hafalan::findOrFail($id);
        return view('pembimbing.hafalan.edit', compact('hafalan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:belum disetujui,disetujui,ditolak',
        ]);

        $hafalan = Hafalan::findOrFail($id);
        $hafalan->update([
            'status' => $request->status,
        ]);

        return redirect()->route('pembimbing.hafalan.index')->with('success', 'Status hafalan berhasil diperbarui.');
    }
}
