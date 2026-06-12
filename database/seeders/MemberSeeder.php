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
                'nama' => 'Muhammad Fairuz Dzaki',
                'nim' => '102022300430', // Sesuaikan NIM asli
                'kelas' => 'SI-47-04',
                'jurusan' => 'Sistem Informasi',
                'fakultas' => 'Fakultas Rekayasa Industri',
                'alamat' => 'Bogor',
                'deskripsi' => 'Mahasiswa Sistem Informasi',
                'foto_path' => 'images/Muhammad_Fairuz_Dzaki.jpeg', // File ditaruh di public/images/dzaki.jpg
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Diva Gemellia Putri ',
                'nim' => '102022300233',
                'kelas' => 'SI-47-04',
                'jurusan' => 'Sistem Informasi',
                'fakultas' => 'Fakultas Rekayasa Industri',
                'alamat' => 'Padang',
                'deskripsi' => 'Mahasiswa Sistem Informasi',
                'foto_path' => 'images/Diva_Gemellia_Putri.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Vibie Alyvia',
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
                'nama' => 'Wisnu Cakra Putra Pamungkas',
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
                'nama' => 'M.Yudhistira',
                'nim' => '102022300296',
                'kelas' => 'SI-47-04',
                'jurusan' => 'Sistem Informasi',
                'fakultas' => 'Fakultas Rekayasa Industri',
                'alamat' => 'Tangerang',
                'deskripsi' => 'Mahasiswa Sistem Informasi',
                'foto_path' => 'images/M_Yudhistira.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}