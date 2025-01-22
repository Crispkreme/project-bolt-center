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
                'company_name' => $data['company_name'],
                'company_email' => $data['company_email'] ?? null,
                'company_phone' => $data['company_phone'] ?? null,
                'company_website' => $data['company_website'] ?? null,
                'civil_status' => $data['civil_status'] ?? null,
                'address' => $data['address'] ?? null,
                'industry' => $data['industry'] ?? null,
                'company_status' => $data['company_status'],
            ]
        );
    }

    public function getAllCompany($perPage = 10)
    {
        $data = $this->model->paginate($perPage);

        $data->transform(function ($item) {
            $item->role = $item->user->role ?? 'Admin';
            $item->created_at = Carbon::parse($item->created_at)->format('F j, Y');
            unset($item->deleted_at, $item->updated_at);
        
            return $item;
        });

        return $data;
    }

    public function deleteCompanyById($id)
    {
        return $this->model->where('id', $id)->delete();
    }

    public function findCompanyById($id)
    {
        return $this->model->find($id);
    }
}