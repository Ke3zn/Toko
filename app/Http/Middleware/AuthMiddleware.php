<?php
namespace App\Http\Middleware;

use Closure;                            // Untuk meneruskan atau menghentikan request
use Illuminate\Support\Facades\Auth;    // Untuk mengecek status login user

class AuthMiddleware
{
    // Middleware untuk memastikan user sudah login
    public function handle($request, Closure $next)
    {
        // Jika user BELUM login
        if (!Auth::check()) {

            // Arahkan ke halaman login
            return redirect('/login');
        }

        // Jika user sudah login, lanjutkan request ke controller
        return $next($request);
    }
}
