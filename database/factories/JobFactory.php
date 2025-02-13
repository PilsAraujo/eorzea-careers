<?php

namespace Database\Factories;

use App\Models\Faction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'faction_id' => Faction::factory(),
            'title' => fake()->jobTitle,
            'salary' => fake()->randomElement(['15.000 Gil', '30.000 Gil', '50.000 Gil']),
            'location' => 'Ishgard',
            'schedule' => fake()->randomElement(['Full time', 'Part Time']),
            'url' => fake()->url,
            'featured' => false,
        ];
    }
}
