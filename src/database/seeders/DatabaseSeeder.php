<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(ContributionSeeder::class);
        $this->call(ShareSeeder::class);
        $this->call(ReplySeeder::class);
        $this->call(ActivitySeeder::class);
        $this->call(FollowSeeder::class);
    }
}
