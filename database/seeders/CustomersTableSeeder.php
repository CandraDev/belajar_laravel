<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            [
                'name_customer' => 'Ahmad Fauzi',
                'gender' => 'Male',
                'contact' => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_customer' => 'Rina Amelia',
                'gender' => 'Female',
                'contact' => '081987654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_customer' => 'Budi Santoso',
                'gender' => 'Male',
                'contact' => '081223344556',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_customer' => 'Siti Nurhaliza',
                'gender' => 'Female',
                'contact' => '081334455667',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_customer' => 'Andi Pratama',
                'gender' => 'Male',
                'contact' => '081445566778',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
