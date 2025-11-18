<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PetugasLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Jika admin login → tolak
        if (Auth::guard('admin')->check()) {
            $admin = Auth::guard('admin')->user();
            return redirect()->route('admin.dashboard')
                ->with('error', 'Kamu admin, bukan petugas (' . $admin->name . ')');
        }

        // Jika user biasa login → tolak
        if (Auth::check()) { // guard web
            $user = Auth::user();
            return redirect()->route('user.dashboard')
                ->with('error', 'Kamu user, bukan petugas (' . $user->name . ')');
        }

        // Jika petugas BELUM login → tolak
        if (!Auth::guard('petugas')->check()) {
            return redirect()->route('petugas.sign-in')
                ->with('error', 'Kamu harus login sebagai petugas');
        }


        return $next($request);
    }
}
