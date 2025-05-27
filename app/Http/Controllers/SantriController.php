<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setoran;
use Illuminate\Support\Facades\Auth;
use PDF; // Pastikan sudah install barryvdh/laravel-dompdf

class SantriController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil data setoran user login, paginate 10 per halaman
        $setorans = Setoran::where('user_id', $user->id)
                    ->with('user')
                    ->latest()
                    ->paginate(10);

        // Hitung total setoran user
        $totalSetoran = Setoran::where('user_id', $user->id)->count();

        return view('santri.setoran.index', compact('setorans', 'totalSetoran'));
    }

    public function downloadPdf()
    {
        $user = Auth::user();

        $setorans = Setoran::where('user_id', $user->id)
                    ->with('user')
                    ->latest()
                    ->get();

        $pdf = PDF::loadView('santri.setoran.pdf', compact('setorans', 'user'));

        return $pdf->download('hafalan-santri-' . $user->name . '.pdf');
    }
}
