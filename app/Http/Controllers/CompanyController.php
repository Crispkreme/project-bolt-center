<?php

namespace App\Http\Controllers;

use App\Contracts\CompanyContract;
use Exception;
use Illuminate\Http\Request;
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

    public function categoryStore(Request $request, $id = null)
    {
        try {

            $data = $request->validate([
                'category' => 'required|string|max:255',
                'category_slug' => 'string|max:255|unique:categories,category_slug',
            ]);

            if (empty($data['category_slug'])) {
                $data['category_slug'] = Str::slug($data['category']);
            }
            $data['category_status'] = 'Active';

            if($id) {
                $data['id'] = $id;
                $this->companyContract->updateOrCreateCompany($data);
            } else {
                $this->companyContract->updateOrCreateCompany($data);
            }

            return response()->json([
                'success' => true,
                'message' => 'Category created successfully!'
            ]);

        } catch (Exception $e) {

            Log::error('Error in categoryStore: ' . $e->getMessage());

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()
                   ->back()
                   ->with($notification);
        } 
    }
}
