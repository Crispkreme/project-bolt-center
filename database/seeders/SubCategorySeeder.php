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
        $categories = DB::table('categories')->get();
        $users = DB::table('users')->limit(2)->pluck('id')->toArray();

        $subCategories = [];

        foreach ($categories as $category) {
            $subCategories[] = [
                'category_id' => $category->id,
                'user_id' => $users[array_rand($users)],
                'sub_category' => $category->category . ' Subcategory',
                'description' => 'Description for ' . $category->category . ' Subcategory',
                'sub_category_slug' => Str::slug($category->category . ' Subcategory'),
                'sub_category_status' => 'Active',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('sub_categories')->insert($subCategories);
    }
}

