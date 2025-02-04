<?php

namespace App\Http\Controllers;

use App\Contracts\UserContract;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;

class EmployeeController extends Controller
{
    protected $userContract;

    public function __construct(
        UserContract $userContract,
    ) {
        $this->userContract = $userContract;
    }

    public function getAllEmployee()
    {
        try {
            
            $employees = $this->userContract->getAllEmployeeByUser();

            return view('pages.admin.employees.employee-list', [
                'employees' => $employees,
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
}
