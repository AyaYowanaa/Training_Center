<?php

namespace Database\Seeders;

use App\Models\setting\Entity;
use App\Models\training_center\Students;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Training_CenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Students::factory()->count(50)->create();
        Entity::factory()->count(10)->create();
    }
}
