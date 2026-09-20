@extends('layouts.app')

@section('judul', 'Detail Mahasiswa')

@section('konten')

<h1 class="h3 mb-4">Detail Mahasiswa</h1>

<div class="card mb-4">
    <div class="card-body">

        <h5>{{ $mahasiswa->nama }}</h5>

        <p class="mb-1">
            <strong>NIM:</strong> {{ $mahasiswa->nim }}
        </p>

        <p class="mb-1">
            <strong>Program Studi:</strong>
            {{ $mahasiswa->programStudi->nama }}
        </p>

        <p class="mb-1">
            <strong>Angkatan:</strong>
            {{ $mahasiswa->angkatan }}
        </p>

        <p class="mb-0">
            <strong>IPK:</strong>
            {{ $mahasiswa->ipk }}
        </p>

    </div>
</div>

<h5>Daftar Mata Kuliah</h5>

<table class="table table-striped bg-white">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Semester</th>
            <th>Nilai</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($mahasiswa->matakuliahs as $matakuliah)
            <tr>
                <td>{{ $matakuliah->kode }}</td>
                <td>{{ $matakuliah->nama }}</td>
                <td>{{ $matakuliah->sks }}</td>
                <td>{{ $matakuliah->semester }}</td>
                <td>{{ $matakuliah->pivot->nilai }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('mahasiswa.data') }}" class="btn btn-secondary">
    Kembali
</a>

@endsection