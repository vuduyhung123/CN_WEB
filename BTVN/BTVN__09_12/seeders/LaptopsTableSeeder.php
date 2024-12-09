<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LaptopsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $renterIds = DB::table('renters')->pluck('id');

        foreach (range(1, 15) as $index) {
            DB::table('laptops')->insert([
                'brand' => $faker->randomElement(['Dell', 'HP', 'Apple', 'Lenovo']),
                'model' => $faker->word . " " . $faker->numberBetween(1000, 9999),
                'specifications' => $faker->sentence(6),
                'rental_status' => $faker->boolean,
                'renter_id' => $faker->randomElement($renterIds->toArray()),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
