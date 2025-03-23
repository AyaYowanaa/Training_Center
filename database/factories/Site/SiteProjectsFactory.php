<?php

namespace Database\Factories\Site;

use App\Models\setting\City;
use App\Models\setting\District;
use App\Models\Site\SiteProjects;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Site\SiteProject>
 */
class SiteProjectsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = SiteProjects::class;

    public function definition()
    {
        return [
            'title' => [
                'en' => $this->faker->sentence,
                'ar' => $this->faker->sentence,
            ],
            'details' => [
                'en' => $this->faker->paragraph,
                'ar' => $this->faker->paragraph,
            ],'features' => [
                'en' => $this->faker->paragraph,
                'ar' => $this->faker->paragraph,
            ],
            'location' => [
                'en' => $this->faker->city,
                'ar' => $this->faker->city,
            ],
            'city_id' => City::inRandomOrder()->first()->id,
            'district_id' => District::inRandomOrder()->first()->id,
//            'date_at' => date('Y-m-d',strtotime($this->faker->date)),
            'from_time' => $this->faker->time,
            'to_time' => $this->faker->time,
            'location_map' => $this->faker->url,
            'publisher' => \App\Models\Admin::inRandomOrder()->first()->id,
//            'main_image' => asset('assets/media/books/12.png'),
        ];
    }
}
