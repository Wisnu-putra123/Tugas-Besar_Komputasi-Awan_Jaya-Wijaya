@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-6">
    
    <div class="mb-6">
        <a href="{{ route('members') }}" class="inline-flex items-center text-sm font-semibold text-slate-500 hover:text-slate-800 transition">
            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Daftar Anggota
        </a>
    </div>

    <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 p-8 md:p-10">
        <div class="mb-8">
            <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Edit Profil Anggota</h2>
            <p class="text-sm text-slate-500 mt-1">Perbarui data profil tim Anda untuk keperluan dokumentasi proyek.</p>
        </div>

        @if($errors->any())
            <div class="mb-6 p-4 bg-rose-50 text-rose-800 text-sm rounded-2xl border border-rose-100">
                <p class="font-bold mb-1">Mohon periksa kembali inputan Anda:</p>
                <ul class="list-disc pl-5 space-y-0.5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('members.update', $member->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-1.5">
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 px-1">Nama Lengkap</label>
                    <input type="text" name="nama" value="{{ old('nama', $member->nama) }}" 
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-sm focus:bg-white focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition" required>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 px-1">NIM</label>
                    <input type="text" name="nim" value="{{ old('nim', $member->nim) }}" 
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-sm focus:bg-white focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition" required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="space-y-1.5">
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 px-1">Kelas</label>
                    <input type="text" name="kelas" value="{{ old('kelas', $member->kelas) }}" 
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-sm focus:bg-white focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition" required>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 px-1">Jurusan</label>
                    <input type="text" name="jurusan" value="{{ old('jurusan', $member->jurusan) }}" 
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-sm focus:bg-white focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition" required>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 px-1">Fakultas</label>
                    <input type="text" name="fakultas" value="{{ old('fakultas', $member->fakultas) }}" 
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-sm focus:bg-white focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition" required>
                </div>
            </div>

            <div class="space-y-1.5">
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 px-1">Alamat</label>
                <input type="text" name="alamat" value="{{ old('alamat', $member->alamat) }}" 
                    class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-sm focus:bg-white focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition" required>
            </div>

            <div class="space-y-1.5">
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 px-1">Deskripsi Ringkas</label>
                <textarea name="deskripsi" rows="3" 
                    class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-4 text-sm focus:bg-white focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 outline-none transition resize-none" required>{{ old('deskripsi', $member->deskripsi) }}</textarea>
            </div>

            <!-- <div class="space-y-2 border-t border-slate-100 pt-5">
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 px-1">Ubah Foto Profil</label>
                <div class="flex items-center space-x-4">
                    <img src="{{ asset($member->foto_path) }}" alt="Preview" class="w-16 h-16 rounded-2xl object-cover border border-slate-200 shadow-sm shrink-0">
                    <div class="w-full">
                        <input type="file" name="foto" 
                            class="block w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 file:cursor-pointer transition">
                        <p class="text-[11px] text-slate-400 mt-1">Format: JPG, JPEG, atau PNG. Maksimal ukuran file 2MB.</p>
                    </div>
                </div>
            </div> -->

            <div class="flex justify-end space-x-3 pt-6 border-t border-slate-100 mt-4">
                <a href="{{ route('members') }}" 
                    class="px-5 py-3 text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-2xl transition text-sm font-semibold active:scale-[0.98]">
                    Batal
                </a>
                <button type="submit" 
                    class="px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold rounded-2xl transition shadow-md shadow-blue-500/10 hover:shadow-lg text-sm active:scale-[0.98]">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection