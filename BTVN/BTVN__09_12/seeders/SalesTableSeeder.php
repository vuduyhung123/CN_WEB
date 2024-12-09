<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sales')->insert([
            [
                'medicine_id' => 1, // Paracetamol
                'quantity' => 10,
                'sale_date' => now(),
                'customer_phone' => '0123456789',
            ],
            [
                'medicine_id' => 2, // Amoxicillin
                'quantity' => 5,
                'sale_date' => now(),
                'customer_phone' => '0987654321',
            ],
        ]);
    }
}

