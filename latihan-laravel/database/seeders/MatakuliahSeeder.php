<?php

namespace Database\Seeders;

use App\Models\Matakuliah;
use Illuminate\Database\Seeder;

class MatakuliahSeeder extends Seeder
{
    public function run(): void
    {
        $daftar = [
            [
                'kode' => 'TK101',
                'nama' => 'Pemrograman Web',
                'sks' => 3,
                'semester' => 3,
            ],
            [
                'kode' => 'TK102',
                'nama' => 'Basis Data',
                'sks' => 3,
                'semester' => 3,
            ],
            [
                'kode' => 'TK103',
                'nama' => 'Jaringan Komputer',
                'sks' => 3,
                'semester' => 3,
            ],
            [
                'kode' => 'TK104',
                'nama' => 'Sistem Operasi',
                'sks' => 3,
                'semester' => 3,
            ],
            [
                'kode' => 'TK105',
                'nama' => 'Pemrograman Berorientasi Objek',
                'sks' => 3,
                'semester' => 4,
            ],
        ];

        foreach ($daftar as $item) {
            Matakuliah::create($item);
        }
    }
}