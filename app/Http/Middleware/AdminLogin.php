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
            return redirect()->route("user.dashboard")->with("info", "kamu adalah user bukan admin");
        }
        // jika yang login adalah petugas
        if (Auth::guard('petugas')->check()) {
            $petugas = Auth::guard('petugas')->user();
            return redirect()->route('petugas.dashboard')
                ->with('info', 'Kamu petugas, bukan  admin (' . $petugas->username . ')');
        }

        // Jika petugas BELUM login → tolak
        if (!Auth::guard('admins')->check()) {
            return redirect()->route('admin.sign-in')
                ->with('info', 'Kamu harus login sebagai admin');
        }


        return $next($request);
    }
}
