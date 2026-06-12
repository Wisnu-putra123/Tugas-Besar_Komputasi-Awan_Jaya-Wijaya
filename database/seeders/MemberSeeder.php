<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('members')->insert([
            [
                'nama' => 'Dzaki',
                'nim' => '102022300430', // Sesuaikan NIM asli
                'kelas' => 'SI-47-04',
                'jurusan' => 'Sistem Informasi',
                'fakultas' => 'Fakultas Rekayasa Industri',
                'alamat' => 'Bandung',
                'deskripsi' => 'Mahasiswa Sistem Informasi',
                'foto_path' => 'images/Muhammad_Fairuz_Dzaki.jpeg', // File ditaruh di public/images/dzaki.jpg
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Diva',
                'nim' => '102022300233',
                'kelas' => 'SI-47-04',
                'jurusan' => 'Sistem Informasi',
                'fakultas' => 'Fakultas Rekayasa Industri',
                'alamat' => 'Bandung',
                'deskripsi' => 'Mahasiswa Sistem Informasi',
                'foto_path' => 'images/Diva_Gemellia_Putri.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Vibie',
                'nim' => '102022300006',
                'kelas' => 'SI-47-04',
                'jurusan' => 'Sistem Informasi',
                'fakultas' => 'Fakultas Rekayasa Industri',
                'alamat' => 'Bandung',
                'deskripsi' => 'Mahasiswa Sistem Informasi',
                'foto_path' => 'images/Vibie_Alyvia.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Wisnu',
                'nim' => '102022300259',
                'kelas' => 'SI-47-04',
                'jurusan' => 'Sistem Informasi',
                'fakultas' => 'Fakultas Rekayasa Industri',
                'alamat' => 'Bandung',
                'deskripsi' => 'Mahasiswa Sistem Informasi',
                'foto_path' => 'images/Wisnu_Cakra_Putra_Pamungkas.JPG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Yudhis',
                'nim' => '102022300296',
                'kelas' => 'SI-47-04',
                'jurusan' => 'Sistem Informasi',
                'fakultas' => 'Fakultas Rekayasa Industri',
                'alamat' => 'Bandung',
                'deskripsi' => 'Mahasiswa Sistem Informasi',
                'foto_path' => 'images/M_Yudhistira.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}