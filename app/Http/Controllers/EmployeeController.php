<?php

namespace App\Http\Controllers;

use App\Contracts\AccountContract;
use App\Contracts\EmployeeContract;
use App\Contracts\UserContract;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class EmployeeController extends Controller
{
    protected $userContract;
    protected $accountContract;
    protected $employeeContract;

    public function __construct(
        UserContract $userContract,
        AccountContract $accountContract,
        EmployeeContract $employeeContract,
    ) {
        $this->userContract = $userContract;
        $this->employeeContract = $employeeContract;
        $this->accountContract = $accountContract;
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

    public function addEmployee()
    {
        return view('pages.admin.employees.add-employee');
    }

    public function storeEmployee(Request $request)
    {
        try {
            
            DB::beginTransaction();
            
            $userData = $request->validate([
                'email'    => 'nullable|email|unique:users,email',
                'password' => 'required|string|min:6',
            ]);
            
            $user = $this->userContract->updateOrCreateUser($userData);
            
            $accountData = $request->validate([
                'user_id'      => 'nullable|exists:users,id|unique:accounts,user_id',
                'gender'       => 'required|in:Male,Female',
                'birthday'     => 'required|date',
                'phone'        => 'required|string|max:15',
                'civil_status' => 'required|in:Single,Married,Divorce,Separated',
                'religion'     => 'required|string|max:100',
                'address'      => 'required|string|max:255',
            ]);  

            $imagePath = null;
            if ($request->hasFile('profile')) {
                $file = $request->file('profile');
                $imagePath = $file->store('profile_images', 'public');
                $imagePath = asset('storage/' . $imagePath);
            }

            if ($request->has('birthday')) {
                $accountData['birthday'] = Carbon::createFromFormat('d-m-Y', $request->birthday)->format('Y-m-d');
            }
            
            $accountData['user_id'] = $user->id;
            $accountData['name'] = trim($request->firstname . ' ' . $request->mi . ' ' . $request->lastname);
            $accountData['profile'] = $imagePath;
            
            $account = $this->accountContract->updateOrCreateAccount($accountData);
            
            $employeeData = $request->validate([
                'account_id'    => 'nullable|exists:accounts,id|unique:employees,account_id',
                'emp_id'        => 'nullable|string|max:255',
                'designation'   => 'nullable|string|max:255',
                'experience'    => 'nullable|string|max:255',
                'salary'        => 'nullable|string|max:15',
                'leave'         => 'nullable|string|max:50',
                'hired_date'    => 'nullable|date',
                'resign_date'   => 'nullable|date',
            ]);

            $employeeData['emp_id'] = null;
            if (empty($employeeData['emp_id'])) {
                $lastEmployee = $this->employeeContract->getLastEmployee();
                $nextId = $lastEmployee ? $lastEmployee->id + 1 : 1;
                $employeeData['emp_id'] = 'EMP-' . str_pad($nextId, 6, '0', STR_PAD_LEFT);
            }

            if ($request->has('hired_date')) {
                $employeeData['hired_date'] = Carbon::createFromFormat('d-m-Y', $request->hired_date)->format('Y-m-d');
            } else {
                $employeeData['hired_date'] = null;
            }

            if ($request->has('resign_date') && $request->resign_date != null) {
                $employeeData['resign_date'] = Carbon::createFromFormat('d-m-Y', $request->resign_date)->format('Y-m-d');
            } else {
                $employeeData['resign_date'] = null;
            }

            $employeeData['isActive'] = null;
            $employeeData['status'] = null;
            $employeeData['account_id'] = $account->id;
            
            $this->employeeContract->updateOrCreateEmployee($employeeData);

            DB::commit();

            return response()->json([
                'success' => true,
            ]);

        } catch (Exception $e) {

            DB::rollBack();
            
            Log::error('Error in storeEmployee: ' . $e->getMessage());

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        } 
    }

    public function editEmployee($id)
    {
        
        try {
            
            $account = $this->userContract->getAllEmployeeByUserId($id);

            return view('pages.admin.employees.edit-employee', [
                'account' => $account,
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

    public function updateEmployee(Request $request)
    {
        try {
            
            DB::beginTransaction();
            
            $accountData = $request->validate([
                'gender'       => 'nullable|in:Male,Female',
                'birthday'     => 'nullable|date',
                'phone'        => 'nullable|string|max:15',
                'civil_status' => 'nullable|in:Single,Married,Divorce,Separated',
                'religion'     => 'nullable|string|max:100',
                'address'      => 'nullable|string|max:255',
            ]);  

            $imagePath = null;
            if ($request->hasFile('profile')) {

                if ($request->profile) {
                    $existingImagePath = $request->profile;
                    if (Storage::disk('public')->exists($existingImagePath)) {
                        Storage::disk('public')->delete($existingImagePath);
                    }
                }
    
                $file = $request->file('profile');
                $imagePath = $file->store('profile_images', 'public');
                $imagePath = asset('storage/' . $imagePath);
            } else {
                $imagePath = $request->profile;
            }

            if ($request->has('birthday')) {
                $accountData['birthday'] = Carbon::createFromFormat('d-m-Y', $request->birthday)->format('Y-m-d');
            }
            
            $accountData['user_id'] = $request->user_id;
            $accountData['name'] = trim($request->firstname . ' ' . $request->mi . ' ' . $request->lastname);
            $accountData['profile'] = $imagePath;
            $accountData['id'] = $request->account_id;
            
            $this->accountContract->updateOrCreateAccount($accountData);
            
            $employeeData = $request->validate([
                'emp_id'        => 'nullable|string|max:255',
                'designation'   => 'nullable|string|max:255',
                'experience'    => 'nullable|string|max:255',
                'salary'        => 'nullable|string',
                'leave'         => 'nullable|string|max:50',
                'hired_date'    => 'nullable|date',
                'resign_date'   => 'nullable|date',
            ]);

            $employeeData['emp_id'] = null;
            if (empty($employeeData['emp_id']) && empty($request->emp_id)) {
                $lastEmployee = $this->employeeContract->getLastEmployee();
                $nextId = $lastEmployee ? $lastEmployee->id + 1 : 1;
                $employeeData['emp_id'] = 'EMP-' . str_pad($nextId, 6, '0', STR_PAD_LEFT);
            } else {
                $employeeData['emp_id'] = $request->emp_id;
            }

            if ($request->has('hired_date') && $request->hired_date != null) {
                $employeeData['hired_date'] = Carbon::createFromFormat('d-m-Y', $request->hired_date)->format('Y-m-d');
            } else {
                $employeeData['hired_date'] = $request->hired_date;
            }

            if ($request->has('resign_date') && $request->resign_date != null) {
                $employeeData['resign_date'] = Carbon::createFromFormat('d-m-Y', $request->resign_date)->format('Y-m-d');
            } else {
                $employeeData['resign_date'] = null;
            }

            $employeeData['isActive'] = null;
            $employeeData['status'] = null;
            $employeeData['account_id'] = $request->account_id;
            $employeeData['id'] = $request->employee_id;
            
            $this->employeeContract->updateOrCreateEmployee($employeeData);
            
            DB::commit();

            return response()->json([
                'success' => true,
            ]);

        } catch (Exception $e) {

            DB::rollBack();
            
            Log::error('Error in updateEmployee: ' . $e->getMessage());

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        } 
    }
}
