<?php

namespace Database\Factories\setting;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\\Models\\setting\\Entity>
 */
class EntityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => [
                'en' => $this->faker->company,
                'ar' => 'شركة ' . $this->faker->word,
            ],
            'address' => [
                'en' => $this->faker->address,
                'ar' => 'عنوان ' . $this->faker->city,
            ],
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
