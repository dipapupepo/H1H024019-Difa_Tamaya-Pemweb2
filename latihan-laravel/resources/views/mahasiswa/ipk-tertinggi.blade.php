@extends('layouts.app')

@section('judul', 'IPK Tertinggi')

@section('konten')

<h1 class="h3 mb-4">
    10 Mahasiswa dengan IPK Tertinggi
</h1>

<table class="table table-striped bg-white">
    <thead>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Angkatan</th>
            <th>IPK</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($daftarMahasiswa as $mahasiswa)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mahasiswa->nim }}</td>
                <td>{{ $mahasiswa->nama }}</td>
                <td>{{ $mahasiswa->programStudi->nama }}</td>
                <td>{{ $mahasiswa->angkatan }}</td>
                <td>{{ $mahasiswa->ipk }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection