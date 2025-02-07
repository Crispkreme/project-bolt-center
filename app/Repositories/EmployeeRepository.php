<?php

namespace App\Repositories;

use App\Contracts\EmployeeContract;
use App\Models\Employee;
use App\Models\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeRepository implements EmployeeContract
{

    protected $model;

    public function __construct(Employee $model)
    {
        $this->model = $model;
    }

    public function updateOrCreateEmployee($data)
    {
        return $this->model->updateOrCreate(
            [
                'id' => $data['id'] ?? null,
            ],
            [
                'account_id' => $data['account_id'],
                'emp_id' => $data['emp_id'],
                'designation' => $data['designation'] ?? 'Employee',
                'experience' => $data['experience'] ?? null,
                'salary' => $data['salary'] ?? null,
                'leave' => $data['leave'] ?? null,
                'hired_date' => $data['hired_date'] ?? null,
                'resign_date' => $data['resign_date'] ?? null,
                'isActive' => $data['isActive'] ?? true,
                'status' => $data['status'] ?? 'Employed',
                'created_at' => Carbon::now(),
            ]
        );
    }

    public function getLastEmployee()
    {
        return $this->model->orderBy('id', 'desc')->first();
    }
}
