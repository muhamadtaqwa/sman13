<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('nis', 'like', "%{$search}%")
                ->orWhere('nama_lengkap', 'like', "%{$search}%")
                ->orWhere('kode_kelas', 'like', "%{$search}%");
        }

        $students = $query->orderBy('nama_lengkap')->get();

        return view('admin.students', compact('students'));
    }

    // Fungsi Tambah Siswa
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:students,nis|unique:users,username',
            'nama_lengkap' => 'required',
            'kode_kelas' => 'required',
            'password' => 'required|min:6'
        ]);

        // 1. Simpan ke tabel students
        // 1. Simpan ke tabel students dengan kode QR otomatis
        Student::create([
            'nis' => $request->nis,
            'nama_lengkap' => $request->nama_lengkap,
            'kode_kelas' => $request->kode_kelas,
            'kode_qr' => Str::random(10), // Sistem otomatis membuat 10 karakter acak
        ]);

        // 2. Buat akun login di tabel users
        User::create([
            'name' => $request->nama_lengkap,
            'username' => $request->nis, // NIS dijadikan username login
            'password' => Hash::make($request->password), // Enkripsi password
            'role' => 'siswa',
        ]);

        return back()->with('success', 'Siswa berhasil ditambahkan');
    }

    // Fungsi Ubah Data & Password Siswa
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'nama_lengkap' => 'required',
            'kode_kelas' => 'required',
        ]);

        // 1. Update data di tabel students
        $student->update([
            'nama_lengkap' => $request->nama_lengkap,
            'kode_kelas' => $request->kode_kelas,
        ]);

        // 2. Update data di tabel users
        $user = User::where('username', $student->nis)->first();
        if ($user) {
            $user->name = $request->nama_lengkap;

            // Jika kolom password diisi oleh admin, maka ganti passwordnya
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
            $user->save();
        }

        return back()->with('success', 'Data siswa berhasil diperbarui');
    }

    // Fungsi Hapus Siswa
    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        // Hapus juga akun login-nya
        User::where('username', $student->nis)->delete();

        // Hapus data siswanya
        $student->delete();

        return back()->with('success', 'Siswa berhasil dihapus');
    }
}