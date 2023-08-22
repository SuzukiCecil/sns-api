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

            ],
        ]);
    }
}
