<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role): Response
    {
        // 1. Pastikan pengguna sudah login
        if (!Auth::check()) {
            return redirect('/');
        }

        // 2. Ambil jabatan pengguna dari database (hapus spasi berlebih & jadikan huruf kecil semua)
        $userRole = strtolower(trim(Auth::user()->role));
        
        // 3. Ambil syarat jabatan dari rute (jadikan huruf kecil juga agar adil)
        $requiredRole = strtolower(trim($role));

        // 4. Jika jabatannya ternyata cocok, silakan masuk
        if ($userRole === $requiredRole) {
            return $next($request);
        }

        // 5. Jika tidak cocok, tolak aksesnya (403)
        abort(403, 'AKSES DITOLAK: Anda (' . strtoupper($userRole) . ') tidak berhak memasuki halaman khusus ' . strtoupper($requiredRole) . '.');
    }
}