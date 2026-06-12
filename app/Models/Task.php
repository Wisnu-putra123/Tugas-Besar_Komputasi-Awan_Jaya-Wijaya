<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id', 
        'deskripsi_tugas', 
        'deadline', 
        'status'
    ];

    // Relasi: Satu Task dimiliki oleh satu Member
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}