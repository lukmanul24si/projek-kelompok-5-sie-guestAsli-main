<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                
                // --- KODE KHUSUS ANDA (REDIRECT SESUAI ROLE) ---
                
                // Jika user yang login adalah admin, arahkan ke dashboard
                if (Auth::user()->role == 'admin') {
                    // Pastikan rute 'dashboard' atau 'admin.dashboard' ada di web.php
                    // Saya gunakan 'dashboard' sesuai rute web.php terakhir Anda
                    return redirect()->route('dashboard'); 
                }

                // Jika user biasa, arahkan ke homepage
                return redirect()->route('homepage');
                
                // ----------------------------------------------
            }
        }

        return $next($request);
    }
}