<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index(Request $request)
    {
        $daftarMatakuliah = [
            [
                'kode' => 'TK101',
                'nama' => 'Pemrograman Web II',
                'sks' => 3
            ],
            [
                'kode' => 'TK102',
                'nama' => 'Metode Numerik',
                'sks' => 3
            ],
            [
                'kode' => 'TK103',
                'nama' => 'Basis Data',
                'sks' => 4
            ],
            [
                'kode' => 'TK104',
                'nama' => 'Jaringan Komputer',
                'sks' => 2
            ],
            [
                'kode' => 'TK105',
                'nama' => 'Sistem Operasi',
                'sks' => 3
            ],
        ];

        $kataKunci = $request->query('q', '');

        if ($kataKunci !== '') {
            $daftarMatakuliah = array_filter(
                $daftarMatakuliah,
                function ($matakuliah) use ($kataKunci) {
                    return str_contains(
                        strtolower($matakuliah['kode']),
                        strtolower($kataKunci)
                    ) ||
                    str_contains(
                        strtolower($matakuliah['nama']),
                        strtolower($kataKunci)
                    );
                }
            );
        }

        return view('matakuliah.index', [
            'daftarMatakuliah' => $daftarMatakuliah
        ]);
    }

    public function show(string $kode)
    {
        $daftarMatakuliah = [
            'TK101' => [
                'kode' => 'TK101',
                'nama' => 'Pemrograman Web II',
                'sks' => 3
            ],
            'TK102' => [
                'kode' => 'TK102',
                'nama' => 'Metode Numerik',
                'sks' => 3
            ],
            'TK103' => [
                'kode' => 'TK103',
                'nama' => 'Basis Data',
                'sks' => 4
            ],
            'TK104' => [
                'kode' => 'TK104',
                'nama' => 'Jaringan Komputer',
                'sks' => 2
            ],
            'TK105' => [
                'kode' => 'TK105',
                'nama' => 'Sistem Operasi',
                'sks' => 3
            ],
        ];

        $matakuliah = $daftarMatakuliah[$kode] ?? null;

        abort_if($matakuliah === null, 404);

        return view('matakuliah.show', [
            'matakuliah' => $matakuliah
        ]);
    }
}
