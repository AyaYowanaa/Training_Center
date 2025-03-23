<?php

namespace Database\Factories\Site;

use App\Models\Site\SiteBlog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Site\SiteBlog>
 */
class SiteBlogFactory extends Factory
{

    protected $model = SiteBlog::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => [
                'en' => $this->faker->sentence,
                'ar' => $this->faker->sentence,
            ],
            'details' => [
                'en' => $this->faker->paragraph,
                'ar' => $this->faker->paragraph,
            ],

//            'date_at' => date('Y-m-d',strtotime($this->faker->date)),
            'publisher' => \App\Models\Admin::inRandomOrder()->first()->id,
//            'main_image' => asset('assets/images/blank.png')
        ];
    }
}
