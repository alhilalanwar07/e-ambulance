<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SupirMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // jika role = admin
        if (Auth::check() && (Auth::user()->role == 'admin' || Auth::user()->role == 'supir' || Auth::user()->role == 'pimpinan')) {
            return $next($request);
        } else {
            // redirect ke halaman sebelumnya
            return redirect()->back();
        }
        // return $next($request);
    }
}
