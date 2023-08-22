<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FollowSeeder extends Seeder
{
    public function run()
    {
        DB::connection()->table("follow")->insert([
            [
                "followee_id" => 1,
                "follower_id" => 2,
            ],
            [
                "followee_id" => 2,
                "follower_id" => 1,
            ],
            [
                "followee_id" => 3,
                "follower_id" => 1,
            ],
            [
                "followee_id" => 3,
                "follower_id" => 2,
            ],
            [
                "followee_id" => 3,
                "follower_id" => 4,
            ],
        ]);
    }
}
