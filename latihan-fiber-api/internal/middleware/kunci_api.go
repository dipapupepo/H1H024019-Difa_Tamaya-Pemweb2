package middleware

import (
	"os"

	"github.com/gofiber/fiber/v3"
)

// KunciApi memeriksa API Key pada setiap permintaan.
func KunciApi() fiber.Handler {
	return func(c fiber.Ctx) error {
		apiKey := os.Getenv("API_KEY")
		apiKeyRequest := c.Get("X-Api-Key")

		// Tolak permintaan jika API Key tidak tersedia atau tidak cocok.
		if apiKey == "" || apiKeyRequest != apiKey {
			return fiber.NewError(
				fiber.StatusUnauthorized,
				"API Key tidak valid atau tidak tersedia",
			)
		}

		// Lanjutkan permintaan jika API Key benar.
		return c.Next()
	}
}
