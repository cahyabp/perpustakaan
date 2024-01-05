<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'judul' => $this->faker->sentence,
            'penerbit' => $this->faker->company,
            'author' => $this->faker->name,
            'tahun_terbit' => $this->faker->year,
            'url' => 'https://www.youtube.com/embed/XeEU7EDnYt4?si=DbjppszpChQtMKSL
'
        ];
    }
}
