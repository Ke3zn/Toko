<?php
namespace App\Http\Controllers;

use App\Models\User;                 // Model User untuk akses tabel users
use Illuminate\Http\Request;         // Menangkap data dari form
use Illuminate\Support\Facades\Auth; // Autentikasi Laravel (login & logout)
use Illuminate\Support\Facades\Hash; // Enkripsi password

class AuthController extends Controller
{
    // ================= HALAMAN LOGIN =================
    function login() {
        // Menampilkan view form login
        return view('auth.login');
    }

    // ================= HALAMAN REGISTER =================
    function register() {
        // Menampilkan view form pendaftaran akun
        return view('auth.register');
    }

    // ================= PROSES REGISTER USER =================
    function doRegister(Request $r) {

        // Simpan data user baru ke database
        User::create([
            'name'     => $r->name,                 // Nama user dari form
            'email'    => $r->email,                // Email user
            'password' => Hash::make($r->password), // Password dienkripsi
            'role'     => 'user'                    // Role default user
        ]);

        // Setelah register, arahkan ke halaman login
        return redirect('/login');
    }

    // ================= PROSES LOGIN USER =================
   function doLogin(Request $r) {

    // Coba login dengan email & password
    if(Auth::attempt($r->only('email','password'))) {
        return redirect('/dashboard');
    }

    // Jika login gagal, kirim pesan error ke session
    return back()->with('error', 'Password atau email tidak benar');
}


    // ================= PROSES LOGOUT USER =================
    function logout() {

        // Menghapus session login user
        Auth::logout();

        // Kembali ke halaman login
        return redirect('/login');
    }
}
