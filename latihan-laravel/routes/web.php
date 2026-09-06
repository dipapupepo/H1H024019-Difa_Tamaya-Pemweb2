<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'nama' => "Difa' Tamaya Maulidina Adz Dzikro",
        'nim'  => 'H1H024019',
        'prodi'=> 'Teknik Komputer',
    ]);
});
