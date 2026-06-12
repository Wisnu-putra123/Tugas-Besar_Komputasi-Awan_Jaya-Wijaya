<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Member;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Menampilkan semua tugas
    public function index(Request $request)
    {
        // 1. Inisialisasi query dasar beserta Eager Loading relasi member
        $query = Task::with('member');

        // 2. LOGIKA FILTER: Berdasarkan Status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // 3. LOGIKA FILTER: Berdasarkan Anggota Kelompok
        if ($request->filled('member_id')) {
            $query->where('member_id', $request->member_id);
        }

        // 4. LOGIKA SORTIR (PENGURUTAN)
        $sort = $request->get('sort', 'terbaru'); // Default urutan jika kosong

        switch ($sort) {
            case 'deadline_terdekat':
                $query->orderBy('deadline', 'asc');
                break;
            case 'deadline_terlama':
                $query->orderBy('deadline', 'desc');
                break;
            case 'terlama':
                $query->orderBy('created_at', 'asc');
                break;
            case 'terbaru':
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        // 5. Eksekusi query untuk mendapatkan data tugas terfilter
        $tasks = $query->get();

        // 6. Ambil semua data anggota untuk mengisi opsi pilihan filter di View
        $members = Member::all();
        
        return view('tasks.index', compact('tasks', 'members'));
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