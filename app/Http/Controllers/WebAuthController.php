<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebAuthController extends Controller
{
    // 1. Menampilkan halaman form login
    public function showLogin()
    {
        return view('login');
    }

    // 2. Memproses data dari form login
    public function processLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = Auth::user()->role;

            // HAPUS KATA 'intended' DI SINI
            if ($role === 'admin') {
                return redirect('admin/dashboard');
            } elseif ($role === 'guru') {
                return redirect('/guru/dashboard');
            } elseif ($role === 'siswa') {
                return redirect('/siswa/dashboard');
            } else {
                Auth::logout();
                return back()->withErrors(['error' => 'Akses ditolak. Peran tidak dikenali.']);
            }
        }

        return back()->withErrors(['error' => 'Username atau Kata Sandi salah!']);
    }

    // 3. Proses Keluar (Logout)
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}