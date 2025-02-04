<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $employees = [
            [
                'account_id' => 1,
                'emp_id' => 'EMP-' . str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT),
                'designation' => 'Hr',
                'experience' => '1',
                'salary' => '20000',
                'leave' => 0,
                'hired_date' => Carbon::parse('2000-10-10')->format('Y-m-d'),
                'resign_date' => null,
                'isActive' => true,
                'status' => 'Employed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'account_id' => 2,
                'emp_id' => 'EMP-' . str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT),
                'designation' => 'Cashier',
                'experience' => '1',
                'salary' => '10000',
                'leave' => 0,
                'hired_date' => Carbon::parse('2005-10-10')->format('Y-m-d'),
                'resign_date' => null,
                'isActive' => true,
                'status' => 'Employed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('employees')->insert($employees);
    }
}
