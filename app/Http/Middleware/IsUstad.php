<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsUstad
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            // Jika belum login, redirect ke halaman login
            return redirect()->route('login');
        }

        // Cek apakah role user adalah 'ustad'
        if (Auth::user()->role === 'ustad') {
            return $next($request);
        }

        // Jika bukan ustad, tampilkan error 403 Forbidden
        abort(403, 'Akses hanya untuk ustad');
    }
}
