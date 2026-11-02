package handler

import (
	"sort"
	"strconv"

	"latihan-fiber-api/internal/model"

	"github.com/gofiber/fiber/v3"
)

// DaftarMahasiswa menampilkan daftar mahasiswa,
// memfilter berdasarkan angkatan, dan mengurutkan data.
func DaftarMahasiswa(c fiber.Ctx) error {
	angkatan := c.Query("angkatan", "")
	urut := c.Query("urut", "")

	hasil := make([]model.Mahasiswa, 0, len(model.Daftar))
	var nilaiAngkatan int

	// Validasi parameter angkatan.
	if angkatan != "" {
		var err error
		nilaiAngkatan, err = strconv.Atoi(angkatan)
		if err != nil {
			return fiber.NewError(
				fiber.StatusBadRequest,
				"Parameter angkatan harus berupa angka",
			)
		}
	}

	// Filter mahasiswa berdasarkan angkatan.
	for i := 0; i < len(model.Daftar); i++ {
		if angkatan == "" || model.Daftar[i].Angkatan == nilaiAngkatan {
			hasil = append(hasil, model.Daftar[i])
		}
	}

	// Pengurutan berdasarkan nama atau IPK.
	switch urut {
	case "nama":
		sort.Slice(hasil, func(i, j int) bool {
			return hasil[i].Nama < hasil[j].Nama
		})

	case "ipk":
		sort.Slice(hasil, func(i, j int) bool {
			return hasil[i].Ipk > hasil[j].Ipk
		})

	case "":
		// Jika urut tidak diisi, gunakan urutan data awal.

	default:
		return fiber.NewError(
			fiber.StatusBadRequest,
			"Parameter urut harus berupa nama atau ipk",
		)
	}

	return c.JSON(fiber.Map{
		"sukses": true,
		"data":   hasil,
	})
}

// DetailMahasiswa menampilkan detail mahasiswa berdasarkan ID.
func DetailMahasiswa(c fiber.Ctx) error {
	id, err := strconv.Atoi(c.Params("id"))
	if err != nil {
		return fiber.NewError(
			fiber.StatusBadRequest,
			"ID harus berupa angka",
		)
	}

	for i := 0; i < len(model.Daftar); i++ {
		if model.Daftar[i].ID == id {
			return c.JSON(fiber.Map{
				"sukses": true,
				"data":   model.Daftar[i],
			})
		}
	}

	return fiber.NewError(
		fiber.StatusNotFound,
		"Mahasiswa tidak ditemukan",
	)
}

// CariMahasiswaNIM mencari mahasiswa berdasarkan NIM.
func CariMahasiswaNIM(c fiber.Ctx) error {
	nim := c.Params("nim")

	for i := 0; i < len(model.Daftar); i++ {
		if model.Daftar[i].Nim == nim {
			return c.JSON(fiber.Map{
				"sukses": true,
				"data":   model.Daftar[i],
			})
		}
	}

	return fiber.NewError(
		fiber.StatusNotFound,
		"Mahasiswa dengan NIM tersebut tidak ditemukan",
	)
}
