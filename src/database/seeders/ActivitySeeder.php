<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitySeeder extends Seeder
{
    public function run()
    {
        DB::connection()->table("activity")->insert([
            [
                "id" => 1,
                "kind" => 1,
                "child_id" => 1,
                "activation_datetime" => "2023-07-20 12:00:00",
                "activator" => 1,
            ],
            [
                "id" => 2,
                "kind" => 1,
                "child_id" => 2,
                "activation_datetime" => "2023-07-19 12:00:00",
                "activator" => 2,
            ],
            [
                "id" => 3,
                "kind" => 1,
                "child_id" => 3,
                "activation_datetime" => "2023-07-18 12:00:00",
                "activator" => 3,
            ],
            [
                "id" => 4,
                "kind" => 1,
                "child_id" => 4,
                "activation_datetime" => "2023-07-17 12:00:00",
                "activator" => 4,
            ],
            [
                "id" => 5,
                "kind" => 1,
                "child_id" => 5,
                "activation_datetime" => "2023-07-16 12:00:00",
                "activator" => 1,
            ],
            [
                "id" => 6,
                "kind" => 2,
                "child_id" => 1,
                "activation_datetime" => "2023-07-15 12:00:00",
                "activator" => 1,
            ],
            [
                "id" => 7,
                "kind" => 2,
                "child_id" => 2,
                "activation_datetime" => "2023-07-14 12:00:00",
                "activator" => 2,
            ],
            [
                "id" => 8,
                "kind" => 2,
                "child_id" => 3,
                "activation_datetime" => "2023-07-13 12:00:00",
                "activator" => 3,
            ],
            [
                "id" => 9,
                "kind" => 2,
                "child_id" => 4,
                "activation_datetime" => "2023-07-12 12:00:00",
                "activator" => 3,
            ],
            [
                "id" => 10,
                "kind" => 2,
                "child_id" => 5,
                "activation_datetime" => "2023-07-11 12:00:00",
                "activator" => 3,
            ],
            [
                "id" => 11,
                "kind" => 3,
                "child_id" => 1,
                "activation_datetime" => "2023-07-10 12:00:00",
                "activator" => 1,
            ],
            [
                "id" => 12,
                "kind" => 3,
                "child_id" => 2,
                "activation_datetime" => "2023-07-09 12:00:00",
                "activator" => 2,
            ],
            [
                "id" => 13,
                "kind" => 3,
                "child_id" => 3,
                "activation_datetime" => "2023-07-08 12:00:00",
                "activator" => 3,
            ],
            [
                "id" => 14,
                "kind" => 3,
                "child_id" => 4,
                "activation_datetime" => "2023-07-07 12:00:00",
                "activator" => 3,
            ],
            [
                "id" => 15,
                "kind" => 3,
                "child_id" => 5,
                "activation_datetime" => "2023-07-06 12:00:00",
                "activator" => 3,
            ],
            [
                "id" => 16,
                "kind" => 1,
                "child_id" => 6,
                "activation_datetime" => "2023-07-05 12:00:00",
                "activator" => 1,
            ],
            [
                "id" => 17,
                "kind" => 1,
                "child_id" => 7,
                "activation_datetime" => "2023-07-04 12:00:00",
                "activator" => 2,
            ],
            [
                "id" => 18,
                "kind" => 1,
                "child_id" => 8,
                "activation_datetime" => "2023-07-03 12:00:00",
                "activator" => 1,
            ],
            [
                "id" => 19,
                "kind" => 1,
                "child_id" => 9,
                "activation_datetime" => "2023-07-02 12:00:00",
                "activator" => 2,
            ],
            [
                "id" => 20,
                "kind" => 1,
                "child_id" => 10,
                "activation_datetime" => "2023-07-01 12:00:00",
                "activator" => 1,
            ],
        ]);
    }
}
