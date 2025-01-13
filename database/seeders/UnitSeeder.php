<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            ['unit' => 'Kilogram', 'unit_slug' => Str::slug('Kilogram'), 'no_products' => 50, 'unit_status' => 'Active', 'created_at' => now(), 'updated_at' => now()],
            ['unit' => 'Gram', 'unit_slug' => Str::slug('Gram'), 'no_products' => 30, 'unit_status' => 'Active', 'created_at' => now(), 'updated_at' => now()],
            ['unit' => 'Meter', 'unit_slug' => Str::slug('Meter'), 'no_products' => 25, 'unit_status' => 'Active', 'created_at' => now(), 'updated_at' => now()],
            ['unit' => 'Centimeter', 'unit_slug' => Str::slug('Centimeter'), 'no_products' => 15, 'unit_status' => 'Deactivate', 'created_at' => now(), 'updated_at' => now()],
            ['unit' => 'Liter', 'unit_slug' => Str::slug('Liter'), 'no_products' => 40, 'unit_status' => 'Active', 'created_at' => now(), 'updated_at' => now()],
            ['unit' => 'Milliliter', 'unit_slug' => Str::slug('Milliliter'), 'no_products' => 10, 'unit_status' => 'Active', 'created_at' => now(), 'updated_at' => now()],
            ['unit' => 'Piece', 'unit_slug' => Str::slug('Piece'), 'no_products' => 100, 'unit_status' => 'Active', 'created_at' => now(), 'updated_at' => now()],
            ['unit' => 'Box', 'unit_slug' => Str::slug('Box'), 'no_products' => 5, 'unit_status' => 'Deactivate', 'created_at' => now(), 'updated_at' => now()],
            ['unit' => 'Pack', 'unit_slug' => Str::slug('Pack'), 'no_products' => 20, 'unit_status' => 'Active', 'created_at' => now(), 'updated_at' => now()],
            ['unit' => 'Dozen', 'unit_slug' => Str::slug('Dozen'), 'no_products' => 12, 'unit_status' => 'Active', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('units')->insert($units);
    }
}
