@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-sm border border-slate-200">
    <div class="flex items-center space-x-4 mb-6 border-b border-slate-100 pb-4">
        <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center text-white text-2xl font-bold shadow-inner">
            {{ strtoupper(substr($user->name, 0, 1)) }}
        </div>
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Profil Saya</h2>
            <p class="text-sm text-slate-500">Kelola informasi akun dasar Anda di sini.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-200 text-green-700 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Nama Pengguna / Admin</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border border-slate-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none" required>
            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Alamat Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border border-slate-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none" required>
            @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Alamat Rumah (Address)</label>
            <textarea name="address" rows="3" class="w-full border border-slate-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Masukkan alamat lengkap Anda...">{{ old('address', $user->address) }}</textarea>
            @error('address') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex pt-4 border-t border-slate-100">
            <button type="submit" class="px-6 py-2 w-full bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition font-medium shadow-sm">
                Update Profil
            </button>
        </div>
    </form>
    <form action="{{ route('logout') }}" method="POST" class="pt-4">
        @csrf
        <button type="submit" class="w-full flex justify-center items-center px-4 py-3 bg-red-500 text-gray-100 hover:bg-red-900/30 rounded-lg font-medium transition text-left">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
            Keluar (Logout)
        </button>
    </form>
</div>
@endsection