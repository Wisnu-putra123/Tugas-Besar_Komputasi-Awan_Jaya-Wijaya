@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Daftar Tugas Kelompok</h2>
            <p class="text-sm text-slate-500 mt-0.5">Kelola, saring, dan pantau pembagian tugas tim Anda.</p>
        </div>
        <a href="{{ route('tasks.create') }}" class="w-full sm:w-auto px-4 py-2.5 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition shadow-sm font-semibold text-sm text-center active:scale-[0.98]">
            + Tambah Tugas
        </a>
    </div>

    @if(session('success'))
        <div class="mb-5 p-4 bg-emerald-50 text-emerald-800 text-sm rounded-xl border border-emerald-100 flex items-center shadow-sm">
            <svg class="w-5 h-5 mr-2 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-200 mb-6">
        <form action="{{ route('tasks.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 items-end">
            
            <div class="space-y-1.5">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 px-1">Filter Anggota</label>
                <select name="member_id" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-sm outline-none focus:bg-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition cursor-pointer">
                    <option value="">Semua Anggota</option>
                    @foreach($members as $member)
                        <option value="{{ $member->id }}" {{ request('member_id') == $member->id ? 'selected' : '' }}>
                            {{ $member->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="space-y-1.5">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 px-1">Filter Status</label>
                <select name="status" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-sm outline-none focus:bg-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition cursor-pointer">
                    <option value="">Semua Status</option>
                    <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="In Progress" {{ request('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <div class="space-y-1.5">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 px-1">Urutkan Berdasarkan</label>
                <select name="sort" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-sm outline-none focus:bg-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition cursor-pointer">
                    <option value="terbaru" {{ request('sort') == 'terbaru' ? 'selected' : '' }}>Tugas Terbaru</option>
                    <option value="terlama" {{ request('sort') == 'terlama' ? 'selected' : '' }}>Tugas Terlama</option>
                    <option value="deadline_terdekat" {{ request('sort') == 'deadline_terdekat' ? 'selected' : '' }}>Tenggat Terdekat</option>
                    <option value="deadline_terlama" {{ request('sort') == 'deadline_terlama' ? 'selected' : '' }}>Tenggat Terlama</option>
                </select>
            </div>

            <div class="flex gap-2">
                <button type="submit" class="flex-1 bg-slate-800 hover:bg-slate-900 text-white font-semibold py-2.5 rounded-xl transition text-sm shadow-sm text-center active:scale-[0.97]">
                    Terapkan
                </button>
                @if(request()->has('member_id') || request()->has('status') || request()->has('sort'))
                    <a href="{{ route('tasks.index') }}" class="px-3 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-600 rounded-xl transition text-sm font-semibold shadow-sm text-center active:scale-[0.97]" title="Reset Filter">
                        ✕
                    </a>
                @endif
            </div>

        </form>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="w-full overflow-x-auto scrolling-touch">
            <table class="w-full min-w-[800px] text-left border-collapse">
                <thead>
                    <tr class="bg-slate-100 text-slate-600 border-b border-slate-200 text-sm uppercase tracking-wider">
                        <th class="p-4 font-semibold w-16">ID</th>
                        <th class="p-4 font-semibold">Nama Member</th>
                        <th class="p-4 font-semibold">Deskripsi Tugas</th>
                        <th class="p-4 font-semibold">Tenggat Waktu</th>
                        <th class="p-4 font-semibold">Status</th>
                        <th class="p-4 font-semibold text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($tasks as $task)
                    <tr class="hover:bg-slate-50/80 transition">
                        <td class="p-4 text-slate-500">{{ $loop->iteration }}</td>
                        <td class="p-4 font-medium text-slate-800">
                            <div class="flex items-center whitespace-nowrap">
                                <img src="{{ asset($task->member->foto_path) }}" alt="{{ $task->member->nama }}" class="w-8 h-8 rounded-full object-cover mr-3 border border-slate-200">
                                {{ $task->member->nama }}
                            </div>
                        </td>
                        <td class="p-4 text-slate-600 max-w-xs truncate" title="{{ $task->deskripsi_tugas }}">{{ $task->deskripsi_tugas }}</td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            @php
                                $deadlineDate = \Carbon\Carbon::parse($task->deadline);
                            @endphp

                            @if($deadlineDate->isPast() && !$deadlineDate->isToday())
                                <span class="px-2 py-1 bg-red-100 text-red-800 rounded-md font-medium text-sm">
                                    {{ $deadlineDate->format('d M Y') }}
                                </span>
                            @else
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-md font-medium text-sm">
                                    {{ $deadlineDate->format('d M Y') }}
                                </span>
                            @endif
                        </td>
                        <td class="p-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                {{ $task->status == 'Completed' ? 'bg-green-100 text-green-700' : ($task->status == 'In Progress' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">
                                {{ $task->status }}
                            </span>
                        </td>
                        <td class="p-4 text-center space-x-2 whitespace-nowrap">
                            <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-500 hover:text-blue-700 font-medium">Edit</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tugas ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 font-medium cursor-pointer">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="p-8 text-center text-slate-400 italic">Tidak ada data tugas yang sesuai dengan kriteria filter.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection