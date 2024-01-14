<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 2,
            'book_id' => $this->faker->numberBetween(1, 10),
            'tanggal_peminjaman' => Carbon::now()->format('m/d/Y'),
            'batas_pengembalian' => Carbon::now()->addDays(6)->format('m/d/Y'),
            'status' => $this->faker->randomElement(['dikembalikan', 'dipinjam', 'menunggu konfirmasi']),
        ];
    }
}
