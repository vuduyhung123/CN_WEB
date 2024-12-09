<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IssuesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('issues')->insert([
            [
                'computer_id' => 1,
                'quantity' => 1,
                'reported_date' => now(),
                'description' => 'Screen flickering issue.',
                'status' => 'New',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'computer_id' => 2,
                'quantity' => 1,
                'reported_date' => now(),
                'description' => 'Battery not charging.',
                'status' => 'In Progress',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
