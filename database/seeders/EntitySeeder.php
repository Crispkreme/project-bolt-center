<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('entities')->insert([
                'user_id' => $faker->numberBetween(1, 2),
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'entity_type' => $faker->randomElement(['Customer', 'Supplier']),
                'profile' => $faker->imageUrl(150, 150, 'people', true, 'Faker'),
                'entity_status' => $faker->randomElement(['Active', 'Deactivate']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
