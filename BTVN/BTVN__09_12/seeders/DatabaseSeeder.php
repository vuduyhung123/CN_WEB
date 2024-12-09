<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(
            [
                ClassesTableSeeder::class,
                StudentsTableSeeder::class,
                ComputersTableSeeder::class,
                IssuesTableSeeder::class,
                LibrariesTableSeeder::class,
                BooksTableSeeder::class,
                RentersTableSeeder::class,
                LaptopsTableSeeder::class,
                ItCentersTableSeeder::class,
                HardwareDevicesTableSeeder::class,
                CinemasTableSeeder::class,
                MoviesTableSeeder::class,
            ]
        );
    }
}