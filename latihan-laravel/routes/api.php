<?php

use App\Http\Controllers\Api\MahasiswaController;
use App\Http\Controllers\Api\MatakuliahController;
use App\Http\Resources\MahasiswaResource;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/status', function () {
    return response()->json([
        'sukses' => true,
        'pesan' => 'API Pemweb II aktif',
        'waktu' => now()->toIso8601String(),
    ]);
});

Route::apiResource('mahasiswa', MahasiswaController::class);

Route::apiResource(
    'matakuliah',
    MatakuliahController::class
);

Route::get('/program-studi/{id}/mahasiswa', function (Request $request, $id) {
    $kueri = Mahasiswa::query()
        ->where('program_studi_id', $id)
        ->with('programStudi');

    $perHalaman = min($request->integer('per_halaman', 10), 100);

    return MahasiswaResource::collection(
        $kueri->paginate($perHalaman)
    );
});