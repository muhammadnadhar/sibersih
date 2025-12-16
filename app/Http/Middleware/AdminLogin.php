<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check()) {
            return redirect()->route("user.sign-in")->with("error", "kamu adalah user bukan admin");
        }
        // jika yang login adalah petugas 
        if (Auth::guard('petugas')->check()) {
            $petugas = Auth::guard('petugas')->user();
            return redirect()->route('petugas.dashboard')
                ->with('error', 'Kamu petugas, bukan petugas (' . $petugas->username . ')');
        }

        // Jika petugas BELUM login → tolak
        if (!Auth::guard('admins')->check()) {
            return redirect()->route('admin.sign-in')
                ->with('error', 'Kamu harus login sebagai admin');
        }


        return $next($request);
    }
}
