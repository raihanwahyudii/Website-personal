<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Tampilkan form login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = auth()->user()->role;

            if ($role === 'santri') {
                return redirect()->intended(route('santri.hafalan.index'));
            } elseif ($role === 'pembimbing') {
                return redirect()->intended(route('pembimbing.dashboard'));
            } else {
                return redirect()->intended('/');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ])->withInput($request->only('email'));
    }

    // Tampilkan form register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Proses registrasi user baru
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:6'],
            'role' => ['required', 'in:santri,pembimbing'],
        ]);

        // Hash password sebelum simpan
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);

        Auth::login($user);

        // Redirect sesuai role
        if ($user->role === 'santri') {
            return redirect()->route('santri.hafalan.index');
        } else {
            return redirect()->route('pembimbing.dashboard');
        }
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
