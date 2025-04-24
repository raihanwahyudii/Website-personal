<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Rapat;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class RapatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        $rapat = Rapat::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('rapat.index');
    }

    public function downloadArsip($id)
    {
        $arsip = Arsip::findOrFail($id);
        return response()->download(storage_path('app/' . $arsip->file_pdf));
    }

    public function generatePdf($id)
    {
        $rapat = Rapat::findOrFail($id);
        $pdf = PDF::loadView('rapat.pdf', compact('rapat'));
        return $pdf->download('rapat_' . $rapat->id . '.pdf');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rapat $rapat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rapat $rapat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rapat $rapat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rapat $rapat)
    {
        //
    }
}
