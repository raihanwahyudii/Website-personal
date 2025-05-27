<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UstadzController extends Controller
{
    // Tampilkan dashboard ustadz dengan statistik dan daftar
    public function index()
    {
        $totalUstadz = User::where('role', 'ustadz')->count();
        $ustadzList = User::where('role', 'ustadz')->paginate(10);

        return view('admin.ustadz.dashboard', compact('totalUstadz', 'ustadzList'));
    }

    // Form tambah ustadz baru
    public function create()
    {
        return view('admin.ustadz.create');
    }

    // Simpan ustadz baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'ustadz',
        ]);

        return redirect()->route('admin.ustadz.index')->with('success', 'Ustadz berhasil ditambahkan.');
    }

    // Form edit ustadz
    public function edit($id)
    {
        $ustadz = User::where('role', 'ustadz')->findOrFail($id);
        return view('admin.ustadz.edit', compact('ustadz'));
    }

    // Update data ustadz
    public function update(Request $request, $id)
    {
        $ustadz = User::where('role', 'ustadz')->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $ustadz->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $ustadz->name = $request->name;
        $ustadz->email = $request->email;
        if ($request->filled('password')) {
            $ustadz->password = Hash::make($request->password);
        }
        $ustadz->save();

        return redirect()->route('admin.ustadz.index')->with('success', 'Data ustadz berhasil diperbarui.');
    }

    // Hapus ustadz
    public function destroy($id)
    {
        $ustadz = User::where('role', 'ustadz')->findOrFail($id);
        $ustadz->delete();

        return redirect()->route('admin.ustadz.index')->with('success', 'Ustadz berhasil dihapus.');
    }
}
