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
                'User' => $data['User'],
                'User_slug' => $data['User_slug'],
                'no_products' => $data['no_products'] ?? 0,
                'User_status' => $data['User_status'],
                'created_at' => Carbon::now(),
            ]
        );
    }
}
