<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Worker>
 */
class WorkerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'surname'=>fake()->randomElement(surnames),
            'firstName'=>fake()->randomElement(firstNames),
            'patronymic'=>fake()->randomElement(patronymics),
            'category'=>fake()->numberBetween(1, 6),
            'experience'=>fake()->numberBetween(1, 6),
            'profession_id'=>fake()->numberBetween(0, 8),
        ];
    }
}
