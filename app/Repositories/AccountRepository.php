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
        $user = Auth::user();
        $userID = $user->id;

        return $this->model->updateOrCreate(
            [
                'user_id' => $data['user_id'] ?? $userID,
            ],
            [
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
}