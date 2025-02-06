<?php

namespace App\Repositories;

use App\Contracts\AccountContract;
use App\Models\Account;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountRepository implements AccountContract
{

    protected $model;

    public function __construct(Account $model)
    {
        $this->model = $model;
    }

    public function getLoggedInAccount()
    {
        $user = Auth::user();
        if (!$user) {
            return null;
        }
        return $this->model->where('user_id', $user->id)->first();
    }

    public function updateOrCreateAccount($data)
    {
        return $this->model->updateOrCreate(
            [
                'id' => $data['id'] ?? null,
            ],
            [
                'user_id' => $data['user_id'],
                'name' => $data['name'] ?? null,
                'gender' => $data['gender'],
                'birthday' => $data['birthday'],
                'phone' => $data['phone'],
                'civil_status' => $data['civil_status'],
                'religion' => $data['religion'],
                'address' => $data['religion'],
                'profile' => $data['profile'],
            ]
        );
    }
}