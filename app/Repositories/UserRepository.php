<?php

namespace App\Repositories;

use App\Contracts\UserContract;
use App\Models\User;
use App\Models\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserContract
{

    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getAllUser()
    {
        $data = $this->model->get();

        $data->transform(function ($item) {
            $item->created_at = Carbon::parse($item->created_at)->format('F j, Y');
            return $item;
        });

        return $data;
    }

    public function getAllEmployeeByUser()
    {
        $data = $this->model
            ->join('accounts', 'users.id', '=', 'accounts.user_id')
            ->leftJoin('employees', 'accounts.id', '=', 'employees.account_id')
            ->select(
                'users.id as user_id',
                'users.email',
                'users.role',
                'accounts.name',
                'accounts.gender',
                'accounts.birthday',
                'accounts.phone',
                'accounts.civil_status',
                'accounts.religion',
                'accounts.status as account_status',
                'accounts.address',
                'accounts.profile',
                'employees.emp_id',
                'employees.designation',
                'employees.hired_date',
                'employees.isActive',
                'employees.status as employee_status',
                'employees.created_at'
            )
            ->paginate(10);

        $data->transform(function ($item) {
            $item->created_at = Carbon::parse($item->created_at)->format('F j, Y');
            return $item;
        });

        return $data;
    }

    public function updateOrCreateUser($data)
    {
        return $this->model->updateOrCreate(
            [
                'id' => $data['id'] ?? null,
            ],
            [
                'email' => $data['email'],
                'password' => $data['password'],
                'role' => $data['role'] ?? 'Employee',
                'created_at' => Carbon::now(),
            ]
        );
    }

    public function getAllEmployeeByUserId($id)
    {
        $employee = $this->model
            ->join('accounts', 'users.id', '=', 'accounts.user_id')
            ->leftJoin('employees', 'accounts.id', '=', 'employees.account_id')
            ->select(
                'users.id as user_id',
                'accounts.id as account_id',
                'employees.id as employee_id',
                'users.email',
                'users.role',
                'accounts.name',
                'accounts.gender',
                'accounts.birthday',
                'accounts.phone',
                'accounts.civil_status',
                'accounts.religion',
                'accounts.status as account_status',
                'accounts.address',
                'accounts.profile',
                'employees.emp_id',
                'employees.designation',
                'employees.hired_date',
                'employees.isActive',
                'employees.status as employee_status'
            )
            ->where('users.id', $id)
            ->first();

        if ($employee) {
            $nameParts = explode(' ', trim($employee->name));

            $employee->firstname = $nameParts[0] ?? '';
            $employee->mi = isset($nameParts[1]) && strlen($nameParts[1]) === 1 ? $nameParts[1] : '';
            $employee->lastname = isset($nameParts[2]) ? $nameParts[2] : ($nameParts[1] ?? '');
        }

        return $employee;
    }
}
