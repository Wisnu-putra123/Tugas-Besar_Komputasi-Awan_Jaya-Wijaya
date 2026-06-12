<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Menampilkan halaman profil terpadu (Read & Form Edit dalam satu tempat)
    public function show()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    // Memproses update data langsung dari halaman profil
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'address' => 'nullable|string',
        ]);

        $user->update($validated);

        return redirect()->route('profile.show')->with('success', 'Profil Anda berhasil diperbarui!');
    }
}