<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Jika admin  yang  → tolak
        if (Auth::guard('admins')->check()) {
            $admin = auth()->guard('admins')->user();
            return redirect()->route('admin.dashboard')
                ->with('info', 'kamu adalah  admin' . $admin);
        }
        // jika yang login adalah petugas
        if (Auth::guard('petugas')->check()) {
            $petugas = Auth::guard('petugas')->user();
            return redirect()->route('petugas.dashboard')
                ->with('info', 'Kamu petugas, bukan  user (' . $petugas->username . ')');
        }

        if (!Auth()->guard("users")->check()) { // default nya web , tapi sudah saya uabh ke users agar lebih jelas
            return redirect()->route("user.sign-in")->with("info", "silakah login terlebih dahulu");
        }



        return $next($request);
    }
}
