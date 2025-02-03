<?php

namespace App\Repositories;

use App\Contracts\ExpensesContract;
use App\Models\Expenses;
use App\Models\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExpensesRepository implements ExpensesContract
{

    protected $model;

    public function __construct(Expenses $model)
    {
        $this->model = $model;
    }

    public function getAllExpenses()
    {
        $expenses = $this->model
        ->with('user:id,email')
        ->get();

        $expenses->transform(function ($expense) {
            return [
                'expenses' => $expense->expenses,
                'purpose' => $expense->purpose,
                'description' => $expense->description,
                'amount' => $expense->amount,
                'expense_status' => $expense->expense_status,
                'created_by' => optional($expense->user)->email ?? 'N/A',
                'created_at' => Carbon::parse($expense->expense_date)->format('F j, Y'),
            ];
        });

        return $expenses;
    }

    public function updateOrCreateExpenses($data)
    {
        return $this->model->updateOrCreate(
            [
                'id' => $data['id'] ?? null,
            ],
            [
                'user_id' => $data['user_id'],
                'expenses' => $data['expenses'],
                'purpose' => $data['purpose'],
                'description' => $data['description'],
                'amount' => $data['amount'] ?? 0,
                'expense_date' => $data['expense_date'] ?? Null,
                'expense_status' => $data['expense_status'] ?? 'Active',
                'created_at' => Carbon::now(),
            ]
        );
    }
}
