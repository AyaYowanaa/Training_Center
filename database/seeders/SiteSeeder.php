<?php

namespace Database\Seeders;

use App\Models\Site\SiteAbout;
use App\Models\Site\SiteBlog;
use App\Models\Site\SiteProjects;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteProjects::factory()->count(50)->create();
        SiteBlog::factory()->count(50)->create();
        SiteAbout::factory()->count(5)->create();

    }
}
