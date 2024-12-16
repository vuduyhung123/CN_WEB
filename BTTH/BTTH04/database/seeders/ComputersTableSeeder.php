<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ComputersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('computers')->insert([
                'computer_name' => $faker->unique()->word . '-PC' . $index, // Tên máy tính giả
                'model' => $faker->randomElement(['Dell OptiPlex 7090', 'HP ProDesk 600', 'Lenovo ThinkCentre']), // Chọn ngẫu nhiên model
                'operating_system' => $faker->randomElement(['Windows 10', 'Windows 11', 'Ubuntu 20.04']), // Hệ điều hành
                'processor' => $faker->randomElement(['Intel Core i5', 'Intel Core i7', 'AMD Ryzen 5']), // Bộ xử lý
                'memory' => $faker->randomElement([4, 8, 16, 32]), // RAM (GB)
                'available' => $faker->boolean(80), // 80% cơ hội là true
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
