<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function index()
    {
        // Mengambil seluruh data anggota dari database
        $members = Member::all(); 
        
        return view('member.index', compact('members'));
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('member.edit', compact('member'));
    }

    // TAMBAHAN: Memproses pembaruan data ke database
    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);

        // Validasi input data
        $request->validate([
            'nama'      => 'required|string|max:255',
            'nim'       => 'required|string|max:20',
            'kelas'     => 'required|string|max:50',
            'jurusan'   => 'required|string|max:100',
            'fakultas'  => 'required|string|max:100',
            'alamat'    => 'required|string',
            'deskripsi' => 'required|string',
            'foto'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048' // Batas file foto 2MB
        ]);

        // Kumpulkan data teks untuk di-update
        $data = $request->only(['nama', 'nim', 'kelas', 'jurusan', 'fakultas', 'alamat', 'deskripsi']);

        // Logika unggah foto baru jika ada
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            
            // Simpan file ke dalam folder public/uploads
            $file->move(public_path('uploads'), $fileName);
            
            // Masukkan alamat path foto baru ke array data
            $data['foto_path'] = 'uploads/' . $fileName;
        }

        // Jalankan perintah pembaruan database
        $member->update($data);

        // Kembali ke halaman utama profil dengan notifikasi sukses
        return redirect()->route('members.index')->with('success', 'Profil ' . $member->nama . ' berhasil diperbarui!');
    }
}
