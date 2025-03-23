<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([CreateAdminUserSeeder::class]);
        $this->call(CityDistrictSeeder::class);
//        $this->call(SiteSeeder::class);

        ini_set('memory_limit', '-1');



    }
}
