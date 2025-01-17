<?php

namespace App\Http\Controllers;

use App\Contracts\SubCategoryContract;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SubCategoryController extends Controller
{
    protected $subCategoryContract;

    public function __construct(
        SubCategoryContract $subCategoryContract,
    ) {
        $this->subCategoryContract = $subCategoryContract;
    }

    public function subCategoryList()
    {
        try {
            
            $subCategories = $this->subCategoryContract->getAllSubCategory(10);
   
            return view('pages.admin.categories.sub-category-list', [
                'subCategories' => $subCategories,
            ]);

        } catch (Exception $e) {

            Log::error('Error in subCategoryList: ' . $e->getMessage());

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        } 
    }
}
