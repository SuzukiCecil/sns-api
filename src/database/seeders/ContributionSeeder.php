<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContributionSeeder extends Seeder
{
    public function run()
    {
        DB::connection()->table("contribution")->insert([
            [
                "id" => 1,
                "body" => "contribution【activity_id: 1, activator: 1】",
            ],
            [
                "id" => 2,
                "body" => "contribution【activity_id: 2, activator: 2】",
            ],
            [
                "id" => 3,
                "body" => "contribution【activity_id: 3, activator: 3】",
            ],
            [
                "id" => 4,
                "body" => "contribution【activity_id: 4, activator: 4】",
            ],
            [
                "id" => 5,
                "body" => "contribution【activity_id: 5, activator: 1】",
            ],
            [
                "id" => 6,
                "body" => "contribution【activity_id: 16, activator: 1】",
            ],
            [
                "id" => 7,
                "body" => "contribution【activity_id: 17, activator: 2】",
            ],
            [
                "id" => 8,
                "body" => "contribution【activity_id: 18, activator: 1】",
            ],
            [
                "id" => 9,
                "body" => "contribution【activity_id: 19, activator: 2】",
            ],
            [
                "id" => 10,
                "body" => "contribution【activity_id: 20, activator: 1】",
            ],
        ]);
    }
}
