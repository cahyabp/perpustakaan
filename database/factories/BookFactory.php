<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 10),
            'image' => $this->faker->imageUrl(),
            'judul' => $this->faker->sentence,
            'penulis' => $this->faker->name,
            'penerbit' => $this->faker->company,
            'uraian' => $this->faker->paragraphs(2, true),
            'isbn' => $this->faker->isbn13,
            'stock' => $this->faker->numberBetween(1, 100),
            'tahun_terbit' => $this->faker->year(),
            'sumber' => $this->faker->word,
            'kode_tempat' => $this->faker->unique()->regexify('[A-Z0-9]{10}'),
        ];
    }
}
