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
        // jika yang login adalah petugas
        if (Auth::guard('petugas')->check()) {
            $petugas = Auth::guard('petugas')->user();
            return redirect()->route('petugas.dashboard')
                ->with('info', 'Kamu petugas, bukan  user (' . $petugas->username . ')');
        }

     // Jika admin  yang  → tolak
        if (Auth::guard('admins')->check()) {
            return redirect()->route('admin.dashboard')
                ->with('info', 'kamu login sebagai admin');
        }

        if(!Auth()->check()){
            return redirect()->route("user.sign-in")->with("info","silakah login terlebih dahulu");
        }



        return $next($request);
    }
}
