<?php

namespace Database\Factories\Site;

use App\Models\Site\SiteAbout;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Site\SiteAbout>
 */
class SiteAboutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = SiteAbout::class;

    public function definition()
    {
        return [
            'address' => [
                'en' => $this->faker->address,
                'ar' => $this->faker->address,
            ],
            'sub_address' => [
                'en' => $this->faker->secondaryAddress,
                'ar' => $this->faker->secondaryAddress,
            ],
            'details' => [
                'en' => $this->faker->paragraph,
                'ar' => $this->faker->paragraph,
            ],
//            'image' => $this->faker->imageUrl,
        ];
    }
}
