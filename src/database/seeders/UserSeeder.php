<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::connection()->table("user")->insert([
            [
                "name" => "テストユーザー1",
                "email" => "1@example.com",
                "password" => "eyJpdiI6IjRlQitnbmFYREQrUU9zSUxkeHNTQUE9PSIsInZhbHVlIjoib3VXMElkNEhHMjJ2VkZrOUFlN0dLUT09IiwibWFjIjoiMzg4Yjc3M2Y4N2ZjYWIzZjQ4NjE2OWI2Y2QxMDIwNzRjZmU3MTUzZDRlN2EzYmM0MTJkYjVhYWJiN2Q5Y2I3NSIsInRhZyI6IiJ9", // 1q1q1q1q
            ],
            [
                "name" => "テストユーザー2",
                "email" => "2@example.com",
                "password" => "eyJpdiI6IkhDZ0M0aXIvSSs5c0hNeFlKbWxaTFE9PSIsInZhbHVlIjoiNHJkTzBzdVlYbTc0OHE0d1BGSFc3Zz09IiwibWFjIjoiYzBjOTQwMTBmZTQ1NmNkZDQ4ZWNlYTYwYThmYmU3ODUzYThjMGVhODMyMThlMjg3ZDcwMGM1YzMwMDA1YjExZCIsInRhZyI6IiJ9", // 2w2w2w2w
            ],
            [
                "name" => "テストユーザー3",
                "email" => "3@example.com",
                "password" => "eyJpdiI6InZLTkFaaWs4Y1VhZXBjWldSNnIySmc9PSIsInZhbHVlIjoiTDRiR0cxVWRrMlFuam5zTTgzM1lNUT09IiwibWFjIjoiOTc5ZDMwNjE1MzJiYWY1NDk1NmZjNjY0OGYwMGY1YmQzNDg5OWFjMzM1NTBlYzA0ZWU4OTYxNGFkNDVmZDg1NSIsInRhZyI6IiJ9", // 3e3e3e3e
            ],
            [
                "name" => "テストユーザー4",
                "email" => "4@example.com",
                "password" => "eyJpdiI6InVEeTdoTDYzM2sxZk9GSFMxZStlbUE9PSIsInZhbHVlIjoidWo1RmNWQjVSWkUrMU9rY21ta1ZYdz09IiwibWFjIjoiNjUxNTMzNDE3MzQ5MjdjZjE3NWY0NGZjZTRkNGYzZmU3MTI2ZTI5YTFlYWE1MGFkOGFjNmZlN2ExM2MwMTYxZSIsInRhZyI6IiJ9", // 4r4r4r4r
            ],
            [
                "name" => "テストユーザー5",
                "email" => "5@example.com",
                "password" => "eyJpdiI6IllRRTJLbVp0WjBPV25iSmh4d1daK2c9PSIsInZhbHVlIjoidE1KcTZnME5XMXpkQjg4SWI1cU01Zz09IiwibWFjIjoiMGJiZTBiOGVlODI0OTdhMDIzYzJhMGIxNDI4MDNmYTMwZDUwMWIyOGNkNWRjYjA3ZWIzOTIwYTgzMjY1MWM1NSIsInRhZyI6IiJ9", // 5t5t5t5t
            ],
        ]);
    }
}
