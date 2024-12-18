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
}