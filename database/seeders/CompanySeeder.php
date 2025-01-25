<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('companies')->insert([
                'user_id' => $faker->numberBetween(1, 2),
                'supplier_id' => $faker->numberBetween(1, 10),
                'company_name' => $faker->company,
                'company_email' => $faker->unique()->companyEmail,
                'company_phone' => $faker->phoneNumber,
                'company_website' => $faker->url,
                'address' => $faker->address,
                'industry' => $faker->word,
                'company_status' => $faker->randomElement(['Active', 'Deactivate']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
