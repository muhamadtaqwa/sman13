<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // 1. Validasi inputan
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // 2. Cek kecocokan di database
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $user = Auth::user();

            // 3. Berikan respons sukses beserta data user
            return response()->json([
                'status' => 'success',
                'message' => 'Login Berhasil',
                'data' => [
                    'id' => $user->id,
                    'username' => $user->username,
                    'role' => $user->role
                ]
            ], 200);
        }

        // 4. Jika salah sandi/NIP
        return response()->json([
            'status' => 'error',
            'message' => 'NIP atau Kata Sandi salah!'
        ], 401);
    }
}