<?php

namespace Database\Factories\training_center;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\\Models\\training_center\\Students>
 */
class StudentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => strtoupper('STU-' . $this->faker->unique()->numerify('####')),
            'name' => [
                'en' => $this->faker->name,
                'ar' => 'الطالب ' . $this->faker->firstName('male'),
            ],
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'bulk_import' => false,
        ];
    }
}
