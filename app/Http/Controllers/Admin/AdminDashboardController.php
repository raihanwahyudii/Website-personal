<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $jumlahSantri = User::where('role', 'santri')->count();
        $jumlahUstadz = User::where('role', 'ustad')->count();

        return view('admin.dashboard', compact('jumlahSantri', 'jumlahUstadz'));
    }
}
