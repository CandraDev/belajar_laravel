<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BarangsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $barangs = [
            [
                'nama_barang' => 'Laptop',
                'merk' => 'Asus',
                'harga' => 15000000
            ],
            [
                'nama_barang' => 'Smartphone',
                'merk' => 'Samsung',
                'harga' => 5000000
            ],
            [
                'nama_barang' => 'Headphone',
                'merk' => 'Sony',
                'harga' => 1200000
            ],
            [
                'nama_barang' => 'Smartwatch',
                'merk' => 'Apple',
                'harga' => 7000000
            ],
            [
                'nama_barang' => 'Keyboard',
                'merk' => 'Logitech',
                'harga' => 800000
            ]
        ];

        DB::table('barangs')->insert($barangs);
    }
}