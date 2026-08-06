<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.settings', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();

        // Cek password lama
        if (!Hash::check($request->password_lama, $user->password)) {
            return back()->with('error', 'Password lama tidak sesuai!');
        }

        // Update password
        $user->password = Hash::make($request->password_baru);
        $user->save();

        return back()->with('success', 'Password berhasil diubah!');
    }
}