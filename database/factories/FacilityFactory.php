<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Facility>
 */
class FacilityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Keran Air', 'Lampu', 'Toilet', 'Bangku', 'Meja/Kursi']),
            'location' => fake()->randomElement(['GKU', 'Cacuk', 'TULT', 'Convention Hall', 'Open Library']),
            'floor' => fake()->optional()->randomDigit(),
            'room_number' => fake()->optional()->randomElement(['KU2.03.02', 'KU3.01.01', 'TULT-1501', 'TULT-0910', 'KU1.02.01']),
            'description' => fake()->optional()->paragraph(1)
        ];
    }
}
