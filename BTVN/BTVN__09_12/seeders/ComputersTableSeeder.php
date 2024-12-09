<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComputersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('computers')->insert([
            [
                'computer_name' => 'Dell Inspiron',
                'model' => 'Inspiron 15',
                'operating_system' => 'Windows 10 Pro',
                'processor' => 'Intel Core i5',
                'memory' => 8,
                'available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'computer_name' => 'HP Pavilion',
                'model' => 'Pavilion x360',
                'operating_system' => 'Windows 11',
                'processor' => 'Intel Core i7',
                'memory' => 16,
                'available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
