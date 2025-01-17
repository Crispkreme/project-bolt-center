<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subCategories = [
            ['category_id' => 1, 'sub_category' => 'Smartphones', 'sub_category_slug' => Str::slug('Smartphones'), 'description' => 'Mobile phones and gadgets', 'sub_category_status' => 'Active', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 1, 'sub_category' => 'Laptops', 'sub_category_slug' => Str::slug('Laptops'), 'description' => 'Portable computers', 'sub_category_status' => 'Active', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'sub_category' => 'Fiction', 'sub_category_slug' => Str::slug('Fiction'), 'description' => 'Fictional books and novels', 'sub_category_status' => 'Active', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 2, 'sub_category' => 'Non-fiction', 'sub_category_slug' => Str::slug('Non-fiction'), 'description' => 'Non-fictional books and biographies', 'sub_category_status' => 'Deactivate', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 3, 'sub_category' => 'Men\'s Clothing', 'sub_category_slug' => Str::slug('Men\'s Clothing'), 'description' => 'Clothing for men', 'sub_category_status' => 'Active', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 4, 'sub_category' => 'Washing Machines', 'sub_category_slug' => Str::slug('Washing Machines'), 'description' => 'Home appliances for washing clothes', 'sub_category_status' => 'Deactivate', 'created_at' => now(), 'updated_at' => now()],
            ['category_id' => 5, 'sub_category' => 'Fitness Equipment', 'sub_category_slug' => Str::slug('Fitness Equipment'), 'description' => 'Gym and sports equipment', 'sub_category_status' => 'Active', 'created_at' => now(), 'updated_at' => now()],
        ];
    
        DB::table('sub_categories')->insert($subCategories);
    }
}
