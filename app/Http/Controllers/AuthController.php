<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan form registrasi
    public function showRegister()
    {
        return view('auth.register');
    }

    // Memproses data registrasi
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Enkripsi password menggunakan Hash
        $validated['password'] = Hash::make($request->password);

        // 1. Simpan user baru ke database dan tampung objeknya ke dalam variabel $user
        $user = User::create($validated);

        // 2. Otomatis buat session login untuk user yang baru terdaftar
        Auth::login($user);

        // 3. Regenerasi session id untuk keamanan (menghindari session fixation)
        $request->session()->regenerate();

        // 4. Redirect langsung ke halaman daftar tugas dengan pesan sukses
        return redirect()->route('members.index')->with('success', 'Registrasi berhasil dan Anda otomatis masuk ke sistem!');
    }

    // Menampilkan form login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Memproses autentikasi login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Proses pencocokan ke database & pembuatan session
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            return redirect()->intended(route('members.index'))->with('success', 'Selamat datang kembali!');
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    // Memproses logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah berhasil logout.');
    }
}