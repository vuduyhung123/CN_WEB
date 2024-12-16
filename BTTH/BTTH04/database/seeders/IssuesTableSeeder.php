<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class IssuesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            DB::table('issues')->insert([
                'computer_id' => $faker->numberBetween(1, 10), // Giả sử có 10 máy tính trong bảng computers
                'reported_by' => $faker->name, // Tên người báo cáo
                'reported_date' => $faker->dateTimeBetween('-1 month', 'now'), // Ngày báo cáo từ 1 tháng trước đến hiện tại
                'description' => $faker->sentence(10), // Mô tả vấn đề ngẫu nhiên
                'priority' => $faker->randomElement(['Low', 'Medium', 'High']), // Mức độ ưu tiên
                'status' => $faker->randomElement(['Pending', 'In Progress', 'Resolved']), // Trạng thái
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
