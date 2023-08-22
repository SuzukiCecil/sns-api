<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReplySeeder extends Seeder
{
    public function run()
    {
        DB::connection()->table("reply")->insert([
            [
                "contribution_id" => "2",
                "body" => "reply【activity_id: 11, activator: 1, contribution: 2, contribution activator: 2】",
            ],
            [
                "contribution_id" => "1",
                "body" => "reply【activity_id: 12, activator: 2, contribution: 1, contribution activator: 1】",
            ],
            [
                "contribution_id" => "2",
                "body" => "reply【activity_id: 13, activator: 3, contribution: 2, contribution activator: 2】",
            ],
            [
                "contribution_id" => "16",
                "body" => "reply【activity_id: 14, activator: 3, contribution: 16, contribution activator: 1】",
            ],
            [
                "contribution_id" => "20",
                "body" => "reply【activity_id: 15, activator: 3, contribution: 18, contribution activator: 1】",
            ],
        ]);
    }
}
