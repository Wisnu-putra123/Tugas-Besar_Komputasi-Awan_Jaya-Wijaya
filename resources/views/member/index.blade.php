@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-12 text-center">
        <h1 class="text-3xl font-extrabold text-gray-900 md:text-4xl tracking-tight">
            Profil Anggota Kelompok
        </h1>
        <p class="mt-3 text-lg text-gray-600 max-w-2xl mx-auto">
            Tim <span class="font-bold text-blue-600">Jaya Wijaya</span> - Tugas Besar Komputasi Awan (Cloud Computing)
        </p>
        <div class="mt-4 h-1 w-24 bg-blue-600 mx-auto rounded-full"></div>
    </div>

    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 justify-center">
        @foreach($members as $member)
        <div class="overflow-hidden rounded-2xl bg-white shadow-lg border border-gray-100 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl flex flex-col">
            
            <div class="relative h-96 w-full bg-gray-100 overflow-hidden group">
                <img src="{{ asset($member->foto_path) }}" 
                     alt="{{ $member->nama }}" 
                     class="h-full w-full object-cover object-top transition-transform duration-500 group-hover:scale-105">
                
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/95 via-black/60 to-transparent p-6 pt-24">
                    <h2 class="text-2xl font-bold text-white tracking-wide">{{ $member->nama }}</h2>
                    <p class="text-sm font-semibold text-blue-400 mt-1 uppercase tracking-wider">
                        {{ $member->jurusan }} - {{ $member->kelas }}
                    </p>
                </div>
            </div>
            
            <div class="p-6 flex-1 flex flex-col justify-between bg-slate-50/50">
                <div class="space-y-4">
                    
                    <div class="flex items-center justify-between border-b border-gray-200 pb-2">
                        <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">NIM</span>
                        <span class="text-sm font-mono font-bold text-gray-800 bg-white px-3 py-1 rounded-md border shadow-sm">
                            {{ $member->nim }}
                        </span>
                    </div>

                    <div class="flex items-center justify-between border-b border-gray-200 pb-2">
                        <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Fakultas</span>
                        <span class="text-sm font-semibold text-gray-700 text-right">
                            {{ $member->fakultas }}
                        </span>
                    </div>

                    <div class="flex justify-between border-b border-gray-200 pb-2">
                        <span class="text-xs font-bold text-gray-500 uppercase tracking-wider mt-1">Alamat</span>
                        <span class="text-sm font-medium text-gray-600 text-right max-w-[60%] leading-snug">
                            {{ $member->alamat }}
                        </span>
                    </div>
                    
                    <div class="space-y-1 pt-1">
                        <span class="text-xs font-bold text-gray-500 uppercase tracking-wider block">Deskripsi</span>
                        <p class="text-sm text-gray-700 leading-relaxed bg-white p-3 rounded-lg border border-gray-100 shadow-sm italic">
                            "{{ $member->deskripsi }}"
                        </p>
                    </div>

                    <div class="mt-6 pt-4 border-t border-gray-200">
                        <a href="{{ route('members.edit', $member->id) }}" 
                        class="flex items-center justify-center w-full bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white font-semibold py-2.5 px-4 rounded-xl transition-all duration-200 text-sm active:scale-[0.98]">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                            </svg>
                            Edit Profil Anggota
                        </a>
                    </div>


                </div>
            </div>
            
        </div>
        @endforeach
    </div>
</div>
@endsection