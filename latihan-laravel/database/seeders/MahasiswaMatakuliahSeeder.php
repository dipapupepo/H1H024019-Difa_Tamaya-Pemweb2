<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Database\Seeder;

class MahasiswaMatakuliahSeeder extends Seeder
{
    public function run(): void
    {
        $mahasiswas = Mahasiswa::all();
        $matakuliahs = Matakuliah::all();

        foreach ($mahasiswas as $mahasiswa) {
            foreach ($matakuliahs as $matakuliah) {
                $mahasiswa->matakuliahs()->syncWithoutDetaching([
                    $matakuliah->id => [
                        'nilai' => rand(70, 100),
                    ],
                ]);
            }
        }
    }
}