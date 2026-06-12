<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    // Kolom yang diizinkan untuk diisi massal
    protected $fillable = [
        'nama', 
        'nim', 
        'kelas', 
        'jurusan', 
        'fakultas', 
        'alamat', 
        'deskripsi',
        'foto_path'
    ];

    // Relasi: Satu Member bisa memiliki banyak Task (Tugas)
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}