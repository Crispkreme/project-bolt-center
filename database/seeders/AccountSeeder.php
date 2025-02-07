<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AccountSeeder extends Seeder
{
    public function run(): void
    {
        $accounts = [
            [
                'user_id' => 1,
                'name' => 'Admin Admin Admin',
                'gender' => 'Male',
                'birthday' => Carbon::parse('2000-10-10')->format('Y-m-d'),
                'phone' => '09058225214',
                'civil_status' => 'Single',
                'religion' => 'Religion',
                'status' => 'Active',
                'address' => null,
                'profile' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'name' => 'Employee Employee Employee',
                'gender' => 'Female',
                'birthday' => Carbon::parse('2000-10-10')->format('Y-m-d'),
                'phone' => '09058225200',
                'civil_status' => 'Single',
                'religion' => 'Religion',
                'status' => 'Active',
                'address' => null,
                'profile' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('accounts')->insert($accounts);
    }
}
