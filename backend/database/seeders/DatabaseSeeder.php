<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\MenbersTableSeeder;
use Database\Seeders\Learning_languagesTableSeeder;
use Database\Seeders\TimelinesTableSeeder;
use Database\Seeders\RepliesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(MenbersTableSeeder::class);
        $this->call(Learning_languagesTableSeeder::class);
        $this->call(TimelinesTableSeeder::class);
        $this->call(RepliesTableSeeder::class);
    }
}
