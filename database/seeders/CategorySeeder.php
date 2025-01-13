<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['category' => 'Electronics', 'category_slug' => Str::slug('Electronics'), 'category_status' => 'Active', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Books', 'category_slug' => Str::slug('Books'), 'category_status' => 'Active', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Fashion', 'category_slug' => Str::slug('Fashion'), 'category_status' => 'Deactivate', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Home Appliances', 'category_slug' => Str::slug('Home Appliances'), 'category_status' => 'Active', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Sports', 'category_slug' => Str::slug('Sports'), 'category_status' => 'Deactivate', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Toys', 'category_slug' => Str::slug('Toys'), 'category_status' => 'Active', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Health & Beauty', 'category_slug' => Str::slug('Health & Beauty'), 'category_status' => 'Active', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Automotive', 'category_slug' => Str::slug('Automotive'), 'category_status' => 'Deactivate', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Furniture', 'category_slug' => Str::slug('Furniture'), 'category_status' => 'Active', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Gardening', 'category_slug' => Str::slug('Gardening'), 'category_status' => 'Active', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('categories')->insert($categories);
    }
}
