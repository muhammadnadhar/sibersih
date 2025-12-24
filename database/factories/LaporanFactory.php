<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\User;
use App\Models\Petugas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Laporan>
 */
class LaporanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Ambil user, petugas, admin random
        $user = User::inRandomOrder()->first();
        $petugas = Petugas::inRandomOrder()->first();
        $admin = Admin::inRandomOrder()->first();

        return [
            'judul' => $this->faker->sentence(5),
            'kategori' => $this->faker->randomElement(['Sampah Rumah Tangga', 'Sampah Plastik', 'Sampah Organik', 'Sampah Organik dan Non-Organik', "Sampah Non-Organik"]),
            'deskripsi' => $this->faker->paragraph(),
            'nama_pelapor' => $user ? $user->username : 'User Default',
            'nama_petugas' => $petugas ? $petugas->username : null,
            'image_laporan' => 'public/image/default/default.jpg',
            'image_laporan_selesai' => null,
            'status' => $this->faker->randomElement(['pending', 'ditugaskan', 'selesai']),
            'lokasi' => $this->faker->address(),
            'tanggal_laporan' => now(),
            'admin_id' => $admin ? $admin->id : 1,
            'petugas_id' => $petugas ? $petugas->id : null, // petugas memang tidka ada secara default
            'user_id' => $user ? $user->id : 1,
        ];
    }
}
