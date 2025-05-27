<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     * $role = parameter role yang dikirim di route middleware, misal 'admin' atau 'ustad'
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = auth()->user();

        if (!$user || $user->role !== $role) {
            abort(403, 'Akses ditolak.');
        }

        return $next($request);
    }
}
