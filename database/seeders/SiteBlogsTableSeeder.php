<?php

namespace Database\Seeders;

use App\Models\Site\SiteBlog;
use Illuminate\Database\Seeder;

class SiteBlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteBlog::factory()->count(100)->create();

    }
}
