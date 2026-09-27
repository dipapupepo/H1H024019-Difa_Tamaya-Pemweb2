# Dokumentasi API Pemweb II

Base URL: `http://127.0.0.1:8000/api`

## 1. Endpoint Mahasiswa

| Method | URI | Parameter | Contoh Body | Response |
|---|---|---|---|---|
| GET | `/mahasiswa` | cari, angkatan, program_studi_id, per_halaman, urut, arah, fields | - | Daftar data mahasiswa |
| GET | `/mahasiswa/{id}` | ID mahasiswa | - | Detail data mahasiswa |
| POST | `/mahasiswa` | - | JSON data mahasiswa | Data mahasiswa berhasil dibuat |
| PUT/PATCH | `/mahasiswa/{id}` | ID mahasiswa, field yang diperbarui | JSON data mahasiswa | Data mahasiswa berhasil diperbarui |
| DELETE | `/mahasiswa/{id}` | ID mahasiswa | - | Data mahasiswa berhasil dihapus |

### Contoh Body POST

```json
{
    "program_studi_id": 1,
    "nim": "H1A125999",
    "nama": "Dewi Anggraini",
    "email": "dewi.anggraini@example.com",
    "angkatan": 2025,
    "ipk": 3.65
}
```

### Contoh Response

```json
{
    "sukses": true,
    "pesan": "Data mahasiswa berhasil dibuat",
    "data": {
        "id": 32,
        "nim": "H1A125999",
        "nama": "Dewi Anggraini",
        "email": "dewi.anggraini@example.com",
        "angkatan": 2025,
        "ipk": 3.65
    }
}
```

## 2. Endpoint Matakuliah

| Method | URI | Parameter | Contoh Body | Response |
|---|---|---|---|---|
| GET | `/matakuliah` | cari, semester, per_halaman, urut, arah | - | Daftar data matakuliah |
| GET | `/matakuliah/{id}` | ID matakuliah | - | Detail data matakuliah |
| POST | `/matakuliah` | - | JSON data matakuliah | Data matakuliah berhasil dibuat |
| PUT/PATCH | `/matakuliah/{id}` | ID matakuliah, field yang diperbarui | JSON data matakuliah | Data matakuliah berhasil diperbarui |
| DELETE | `/matakuliah/{id}` | ID matakuliah | - | Data matakuliah berhasil dihapus |

### Contoh Body POST

```json
{
    "kode": "TK999",
    "nama": "Praktikum API",
    "sks": 3,
    "semester": 5
}
```

### Contoh Response

```json
{
    "sukses": true,
    "pesan": "Data matakuliah berhasil dibuat",
    "data": {
        "id": 1,
        "kode": "TK999",
        "nama": "Praktikum API",
        "sks": 3,
        "semester": 5
    }
}
```

## 3. Endpoint Mahasiswa Berdasarkan Program Studi

| Method | URI | Parameter | Contoh Body | Response |
|---|---|---|---|---|
| GET | `/program-studi/{id}/mahasiswa` | ID program studi, per_halaman | - | Daftar mahasiswa berdasarkan program studi dengan pagination |

### Contoh

```text
GET /program-studi/1/mahasiswa?per_halaman=5
```

## 4. Parameter Fields

| Parameter | Contoh | Keterangan |
|---|---|---|
| fields | `nim,nama,email` | Memilih field yang ditampilkan |
| per_halaman | `5` | Menentukan jumlah data per halaman |
| angkatan | `2023` | Filter berdasarkan angkatan |
| urut | `ipk` | Menentukan kolom pengurutan |
| arah | `desc` | Menentukan arah pengurutan |

### Contoh

```text
GET /mahasiswa?fields=nim,nama,ipk&per_halaman=5
```

Response menampilkan field yang dipilih pada parameter `fields`.

## 5. Contoh Respons Berhasil

```json
{
    "sukses": true,
    "pesan": "Data matakuliah berhasil dibuat",
    "data": {
        "id": 1,
        "kode": "TK999",
        "nama": "Praktikum API",
        "sks": 3,
        "semester": 5
    }
}
```

## 6. Kode Status

| Status | Keterangan |
|---|---|
| 200 | Permintaan berhasil |
| 201 | Data berhasil dibuat |
| 404 | Data tidak ditemukan |
| 422 | Data gagal validasi |
| 500 | Galat pada server |