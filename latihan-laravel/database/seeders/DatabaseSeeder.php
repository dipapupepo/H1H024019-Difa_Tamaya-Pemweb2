<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\ProgramStudi;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    $this->call(ProgramStudiSeeder::class);
    $this->call(MatakuliahSeeder::class);
    Mahasiswa::factory()->count(30)->create();
    $this->call(MahasiswaMatakuliahSeeder::class);
    }
}
