<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Redirect users after login based on their role.
     */
    protected function redirectTo()
    {
        if (auth()->user()->role === 'admin') {
            return '/admin/dashboard';
        } elseif (auth()->user()->role === 'santri') {
            return '/santri/setoran';
        }

        return '/'; 
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
