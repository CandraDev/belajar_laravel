<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name_product' => 'Laptop ASUS ROG',
                'merk' => 'ASUS',
                'price' => 25000000,
                'stock' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_product' => 'Smartphone Samsung Galaxy S23',
                'merk' => 'Samsung',
                'price' => 15000000,
                'stock' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_product' => 'Printer Canon Pixma G3010',
                'merk' => 'Canon',
                'price' => 3000000,
                'stock' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_product' => 'Headphone Sony WH-1000XM5',
                'merk' => 'Sony',
                'price' => 4500000,
                'stock' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_product' => 'Smartwatch Apple Watch Series 8',
                'merk' => 'Apple',
                'price' => 8000000,
                'stock' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
