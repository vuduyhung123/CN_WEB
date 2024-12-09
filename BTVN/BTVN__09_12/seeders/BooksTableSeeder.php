<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $libraryIds = DB::table('libraries')->pluck('id');

        foreach (range(1, 20) as $index) {
            DB::table('books')->insert([
                'title' => $faker->sentence(3),
                'author' => $faker->name,
                'publication_year' => $faker->year,
                'genre' => $faker->word,
                'library_id' => $faker->randomElement($libraryIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

