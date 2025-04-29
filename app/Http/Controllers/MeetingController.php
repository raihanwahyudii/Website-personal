<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class MeetingController extends Controller
{
    // Tampilkan daftar rapat
    public function index()
    {
        // Menghitung total rapat
        $totalMeetings = Meeting::count();

        // Mendapatkan rapat terbaru, jika ada
        $latestMeeting = Meeting::latest()->first();

        // Mendapatkan rapat yang akan datang, jika ada
        $upcomingMeeting = Meeting::where('date', '>', now())->orderBy('date')->first();

        // Mengambil semua rapat untuk daftar
        $meetings = Meeting::all();

        // Mengirimkan variabel ke view
        return view('meetings.index', compact('totalMeetings', 'latestMeeting', 'upcomingMeeting', 'meetings'));
    }


    // Tampilkan form buat rapat
    public function create()
    {
        return view('meetings.create', [
            'title' => 'Buat Rapat'
        ]);
    }

    // Simpan data rapat ke database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string',
            'participants' => 'required|string',
            'agenda' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        Meeting::create($request->all());

        return redirect()->route('meetings.index')->with('success', 'Rapat berhasil disimpan.');
    }

    // Tampilkan detail rapat
    public function show(Meeting $meeting)
    {
        return view('meetings.show', compact('meeting'));
    }

    // Hapus rapat
    public function destroy(Meeting $meeting)
    {
        $meeting->delete();
        return redirect()->route('meetings.index')->with('success', 'Rapat berhasil dihapus.');
    }

    // Unduh PDF
    public function downloadPdf(Meeting $meeting)
    {
        $pdf = Pdf::loadView('meetings.pdf', compact('meeting') + [
            'title' => 'Rapat'
        ]);
        return $pdf->download('rapat-' . $meeting->id . '.pdf');
    }
}
