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
        // mafaatin Auth bawaan laravel
        if (!Auth::check()) {
            return redirect()->route("user.sign-in")->with("error", "Kamu login dulu");
        }
        // jika malah  petugas || admin yang login
        if (Auth::guard("petugas")->check() || Auth::guard("admins")->check()) {
            $who = Auth::guard("petugas")->user() ?? Auth::guard("admins")->user();
            return redirect()->route("user.sign-in")->with("error", "kamu user bukan +" . $who->name);
        }

        return $next($request);
    }
}
