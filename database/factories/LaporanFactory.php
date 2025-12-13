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
        return [
            'user_id'       => User::inRandomOrder()->first()->id ?? User::factory(),
            'admin_id'      => Admin::inRandomOrder()->first()->id ?? null,
            'petugas_id'    => Petugas::inRandomOrder()->first()->id ?? null,
            "nama_pengadu" => User::inRandomOrder()->first()->name ,
            'judul'         => $this->faker->sentence(4),
            'kategori'      => $this->faker->randomElement(['Kebersihan', 'Lingkungan', 'Fasilitas Umum', 'Keamanan']),
            'deskripsi'     => $this->faker->paragraph(3),

            'file'          => $this->faker->filePath(), // atau nanti diganti file benar

            'status'        => $this->faker->randomElement(['pending', 'diproses', 'ditugaskan', 'selesai']),

            'lokasi'        => $this->faker->address(),
            'tanggal_laporan' => $this->faker->dateTimeBetween('-7 days', 'now'),
        ];
    }
}
