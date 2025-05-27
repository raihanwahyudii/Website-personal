<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setoran;

class UstadController extends Controller
{
    public function index()
    {
        $setorans = Setoran::with('user')->get();
        return view('ustad.index', compact('setorans'))->with('title', 'Halaman Ustad');
    }
}
