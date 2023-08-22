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

            ],
        ]);
    }
}
