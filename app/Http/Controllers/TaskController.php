<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Member;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Menampilkan semua tugas
    public function index()
    {
        // Mengambil semua tugas beserta data member-nya (Eager Loading)
        $tasks = Task::with('member')->latest()->get();
        
        // Nanti diaktifkan saat view sudah siap:
        return view('tasks.index', compact('tasks'));
        
        return response()->json($tasks); // Sementara kembalikan data JSON untuk tes
    }

    // Menampilkan form tambah tugas
    public function create()
    {
        $members = Member::all(); // Mengambil data anggota untuk dropdown pilihan
        return view('tasks.create', compact('members'));
    }

    // Menyimpan tugas baru ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'deskripsi_tugas' => 'required|string',
            'deadline' => 'required|date',
            'status' => 'required|in:Pending,In Progress,Completed',
        ]);

        Task::create($validated);

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil ditambahkan!');
    }

    // Menampilkan form edit tugas
    public function edit(Task $task)
    {
        $members = Member::all();
        return view('tasks.edit', compact('task', 'members'));
    }

    // Memperbarui tugas di database
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'deskripsi_tugas' => 'required|string',
            'deadline' => 'required|date',
            'status' => 'required|in:Pending,In Progress,Completed',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil diperbarui!');
    }

    // Menghapus tugas
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil dihapus!');
    }
}