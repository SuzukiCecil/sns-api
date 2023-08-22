<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShareSeeder extends Seeder
{
    public function run()
    {
        DB::connection()->table("share")->insert([
            [

            ],
        ]);
    }
}
