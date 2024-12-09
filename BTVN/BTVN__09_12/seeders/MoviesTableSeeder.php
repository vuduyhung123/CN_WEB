<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MoviesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $cinemaIds = DB::table('cinemas')->pluck('id');

        foreach (range(1, 15) as $index) {
            DB::table('movies')->insert([
                'title' => $faker->sentence(3),
                'director' => $faker->name,
                'release_date' => $faker->date,
                'duration' => $faker->numberBetween(90, 180),
                'cinema_id' => $faker->randomElement($cinemaIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

