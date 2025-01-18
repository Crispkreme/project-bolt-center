<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['email' => 'admin@admin.com','email_verified_at' => now(),'password' => Hash::make('admin'),'role' => 'Administration','remember_token' => Str::random(10),'created_at' => now(),'updated_at' => now()],
            ['email' => 'employee@employee.com','email_verified_at' => now(),'password' => Hash::make('employee'),'role' => 'Employee','remember_token' => Str::random(10),'created_at' => now(),'updated_at' => now()],
        ];
    
        DB::table('users')->insert($users);
    }
}
