<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class HardwareDevicesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $centerIds = DB::table('it_centers')->pluck('id');

        foreach (range(1, 20) as $index) {
            DB::table('hardware_devices')->insert([
                'device_name' => $faker->word . " " . $faker->randomElement(['Mouse', 'Keyboard', 'Headset']),
                'type' => $faker->randomElement(['Mouse', 'Keyboard', 'Headset']),
                'status' => $faker->boolean,
                'center_id' => $faker->randomElement($centerIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

