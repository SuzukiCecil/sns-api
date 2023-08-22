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
                "contribution_id" => "2",
            ],
            [
                "contribution_id" => "1",
            ],
            [
                "contribution_id" => "2",
            ],
            [
                "contribution_id" => "16",
            ],
            [
                "contribution_id" => "18",
            ],
        ]);
    }
}
