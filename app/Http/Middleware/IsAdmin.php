<?php

namespace App\Http\Middleware;

use Closure;                    // Untuk melanjutkan atau menghentikan request
use Illuminate\Http\Request;    // Representasi request HTTP

class IsAdmin
{
    // Middleware untuk membatasi akses khusus admin
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user sudah login dan memiliki role admin
        if (auth()->check() && auth()->user()->role === 'admin') {

            // Jika admin, lanjutkan ke request berikutnya
            return $next($request);
        }

        // Jika bukan admin, hentikan akses dengan error 403 (Forbidden)
        abort(403, 'Anda bukan admin');
    }
}
