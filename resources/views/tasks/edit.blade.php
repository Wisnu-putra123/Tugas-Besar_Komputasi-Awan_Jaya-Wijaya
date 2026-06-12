@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-sm border border-slate-200">
    <h2 class="text-2xl font-bold text-slate-800 mb-6">Kemaskini Tugasan</h2>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Ditugaskan Kepada</label>
            <select name="member_id" class="w-full border border-slate-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none" required>
                @foreach($members as $member)
                    <option value="{{ $member->id }}" {{ $task->member_id == $member->id ? 'selected' : '' }}>
                        {{ $member->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Deskripsi Tugasan</label>
            <textarea name="deskripsi_tugas" rows="4" class="w-full border border-slate-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none" required>{{ $task->deskripsi_tugas }}</textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Tarikh Akhir (Deadline)</label>
                <input type="date" name="deadline" value="{{ $task->deadline }}" class="w-full border border-slate-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Status</label>
                <select name="status" class="w-full border border-slate-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none" required>
                    <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="In Progress" {{ $task->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
        </div>

        <div class="flex justify-end space-x-3 pt-4 border-t border-slate-100">
            <a href="{{ route('tasks.index') }}" class="px-5 py-2 text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-lg transition font-medium">Batal</a>
            <button type="submit" class="px-5 py-2 bg-blue-600 text-white hover:bg-blue-700 rounded-lg transition font-medium">Kemaskini Tugasan</button>
        </div>
    </form>
</div>
@endsection