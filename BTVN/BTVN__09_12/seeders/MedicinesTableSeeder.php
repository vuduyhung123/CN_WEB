<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicinesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('medicines')->insert([
            [
                'name' => 'Paracetamol',
                'brand' => 'Generic',
                'dosage' => '500mg',
                'form' => 'Tablet',
                'price' => 5.00,
                'stock' => 100,
            ],
            [
                'name' => 'Amoxicillin',
                'brand' => 'Amox Pharma',
                'dosage' => '250mg',
                'form' => 'Capsule',
                'price' => 10.00,
                'stock' => 50,
            ],
        ]);
    }
}
