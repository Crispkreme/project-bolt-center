<?php

namespace App\Http\Controllers;

use App\Contracts\CompanyContract;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CompanyController extends Controller
{
    protected $companyContract;

    public function __construct(
        CompanyContract $companyContract,
    ) {
        $this->companyContract = $companyContract;
    }

    public function companyList()
    {
        try {
            
            $companies = $this->companyContract->getAllCompany(10);
            
            return view('pages.admin.companies.company-list', [
                'companies' => $companies,
            ]);

        } catch (Exception $e) {

            Log::error('Error in companyList: ' . $e->getMessage());

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        } 
    }

    public function companyStore(Request $request, $id = null)
    {
        $user = Auth::user();

        try {
            $data = $request->validate([
                'company_name' => 'required|string|max:255|unique:companies,company_name',
                'company_email' => 'nullable|email',
                'company_phone' => 'nullable|string|max:15',
                'company_website' => 'nullable|url',
                'address' => 'nullable|string|max:600',
                'industry' => 'nullable|string|max:255',
            ]);
            $data['user_id'] = $user->id;
            $data['company_status'] = 'Active';

            if ($id) {
                $data['id'] = $id;
                $this->companyContract->updateOrCreateCompany($data);
            } else {
                $data['id'] = null;
                $this->companyContract->updateOrCreateCompany($data);
            }

            return response()->json([
                'success' => true,
                'message' => 'Company created successfully!',
            ]);

        } catch (Exception $e) {
            Log::error('Error in companyStore: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error occurred: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function companyDelete($id)
    {
        try {
            
            $this->companyContract->deleteCompanyById($id);

            return response()->json([
                'success' => true,
                'message' => 'Category deleted successfully!'
            ]);
            
        } catch (Exception $e) {
            
            Log::error('Error in subCategoryDelete: ' . $e->getMessage());

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function companyEdit($id)
    {
        try {
            
            $company = $this->companyContract->findCompanyById($id);
            
            if (!$company) {
                return response()->json(['error' => 'Company not found'], 404);
            }

            return response()->json($company);
            
        } catch (Exception $e) {
            
            Log::error('Error in companyEdit: ' . $e->getMessage());

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function companyUpdate(Request $request)
    {
        $user = Auth::user();

        try {
            $data = $request->validate([
                'company_name' => 'required|string|max:255|unique:companies,company_name',
                'company_email' => 'nullable|email',
                'company_phone' => 'nullable|string|max:15',
                'company_website' => 'nullable|url',
                'address' => 'nullable|string|max:600',
                'industry' => 'nullable|string|max:255',
                'company_status' => 'required|in:Active,Deactivate',
            ]);
            $data['user_id'] = $user->id;
            $data['id'] = $request->id;

            $this->companyContract->updateOrCreateCompany($data);

            return response()->json([
                'success' => true,
                'message' => 'Company created successfully!',
            ]);

        } catch (Exception $e) {
            Log::error('Error in companyStore: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error occurred: ' . $e->getMessage(),
            ], 500);
        }
    }
}
