<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Jika belum login
        if (!Auth::check()) {
            abort(403, 'Akses ditolak');
        }

        // Jika bukan admin
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses khusus admin');
        }

        return $next($request);
    }
}
