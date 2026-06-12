@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-slate-800">Daftar Tugas</h2>
        <a href="{{ route('tasks.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition shadow-sm font-medium">
            + Tambah Tugasan
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-200 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-100 text-slate-600 border-b border-slate-200 text-sm uppercase tracking-wider">
                    <th class="p-4 font-semibold">ID</th>
                    <th class="p-4 font-semibold">Nama Member</th>
                    <th class="p-4 font-semibold">Deskripsi Tugas</th>
                    <th class="p-4 font-semibold">Tenggat Waktu</th>
                    <th class="p-4 font-semibold">Status</th>
                    <th class="p-4 font-semibold text-center">Tindakan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($tasks as $task)
                <tr class="hover:bg-slate-50 transition">
                    <td class="p-4 text-slate-500">{{ $loop->iteration }}</td>
                    <td class="p-4 font-medium text-slate-800">
                        <div class="flex items-center">
                            <img src="{{ asset($task->member->foto_path) }}" alt="{{ $task->member->nama }}" class="w-8 h-8 rounded-full object-cover mr-3 border border-slate-200">
                            {{ $task->member->nama }}
                        </div>
                    </td>
                    <td class="p-4 text-slate-600">{{ $task->deskripsi_tugas }}</td>
                    <td class="p-4 text-slate-600">{{ \Carbon\Carbon::parse($task->deadline)->format('d M Y') }}</td>
                    <td class="p-4">
                        <span class="px-2 py-1 text-xs font-semibold rounded-full 
                            {{ $task->status == 'Completed' ? 'bg-green-100 text-green-700' : ($task->status == 'In Progress' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">
                            {{ $task->status }}
                        </span>
                    </td>
                    <td class="p-4 text-center space-x-2">
                        <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-500 hover:text-blue-700 font-medium">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Adakah anda pasti mahu memadam tugasan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 font-medium">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-8 text-center text-slate-500 italic">Belum ada data tugasan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection