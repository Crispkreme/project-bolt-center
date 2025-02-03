<?php

namespace App\Http\Controllers;

use App\Contracts\ExpensesContract;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ExpensesController extends Controller
{
    protected $expensesContract;

    public function __construct(
        ExpensesContract $expensesContract,
    ) {
        $this->expensesContract = $expensesContract;
    }

    public function getAllExpenses()
    {
        try {
            
            $expenses = $this->expensesContract->getAllExpenses();

            return view('pages.admin.expenses.expenses-list', [
                'expenses' => $expenses,
            ]);
            
        } catch (Exception $e) {

            Log::error('Error in getAllExpenses: ' . $e->getMessage());

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        } 
    }
    public function expensesStore(Request $request)
    {
        $user = Auth::user();
        try {
            $data = $request->validate([
                'expenses'       => 'required|string|max:255',
                'expense_for'    => 'nullable|string|max:255',
                'description'    => 'nullable|string',
                'amount'         => 'required|numeric|min:0',
                'expense_date'   => 'required|date',
                'expense_status' => 'nullable|in:Active,Inactive',
            ]);
            $data['user_id'] = $user->id;

            if (!isset($data['expense_status'])) {
                $data['expense_status'] = 'Active';
            }

            $this->expensesContract->updateOrCreateExpenses($data);

            return response()->json([
                'success' => true,
            ]);

        } catch (Exception $e) {
            Log::error('Error in expensesStore: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error occurred: ' . $e->getMessage(),
            ], 500);
        }
    }

}
