<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'user_id' => $this->faker->numberBetween(1, 2),
                'book_id' => $this->faker->numberBetween(1, 5),
                'tanggal_pinjam' => Carbon::now()->format('d/m/Y'),
                'tanggal_pengembalian' => Carbon::now()->addDays(7)->format('d/m/Y'),
        ];
    }
}
