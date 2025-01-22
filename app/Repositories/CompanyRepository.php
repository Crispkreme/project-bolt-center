<?php

namespace App\Repositories;

use App\Contracts\CompanyContract;
use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompanyRepository implements CompanyContract
{

    protected $model;

    public function __construct(Company $model)
    {
        $this->model = $model;
    }

    public function updateOrCreateCompany($data)
    {
        $user = Auth::user();
        $userID = $user->id;

        return $this->model->updateOrCreate(
            [
                'id' => $data['id'] ?? null,
            ],
            [
                'user_id' => $data['user_id'] ?? $userID,
                'name' => $data['name'] ?? null,
                'gender' => $data['gender'],
                'birthday' => $data['birthday'],
                'gender' => $data['gender'],
                'civil_status' => $data['civil_status'],
                'gender' => $data['gender'],
                'religion' => $data['religion'],
                'address' => $data['religion'],
                'profile' => $data['profile'],
            ]
        );
    }

    public function getAllCompany($perPage = 10)
    {
        $data = $this->model->paginate($perPage);

        $data->transform(function ($item) {
            $item->created_at = Carbon::parse($item->created_at)->format('F j, Y');
            return $item;
        });

        return $data;
    }
}