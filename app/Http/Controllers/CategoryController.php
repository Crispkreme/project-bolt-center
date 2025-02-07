<?php

namespace App\Http\Controllers;

use App\Contracts\CategoryContract;
use App\Contracts\SubCategoryContract;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    protected $categoryContract;
    protected $subCategoryContract;

    public function __construct(
        CategoryContract $categoryContract,
        SubCategoryContract $subCategoryContract,
    ) {
        $this->categoryContract = $categoryContract;
        $this->subCategoryContract = $subCategoryContract;
    }

    // LIST
    public function categoryList()
    {
        try {
            
            $categories = $this->categoryContract->getAllCategory(10);

            return view('pages.admin.categories.category-list', [
                'categories' => $categories,
            ]);

        } catch (Exception $e) {

            Log::error('Error in categoryList: ' . $e->getMessage());

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        } 
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

    public function categoryStore(Request $request, $id = null)
    {
        try {
            
            DB::beginTransaction();

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
                $this->categoryContract->updateOrCreateCategory($data);
            } else {
                $this->categoryContract->updateOrCreateCategory($data);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Category created successfully!'
            ]);

        } catch (Exception $e) {

            DB::rollBack();

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
    public function subCategoryStore(Request $request)
    {
        try {

            DB::beginTransaction();

            $data = $request->validate([
                'category_id' => 'required|exists:categories,id',
                'sub_category' => 'required|string|max:255',
                'description' => 'nullable|string',
            ]);

            if (empty($data['sub_category_slug'])) {
                $data['sub_category_slug'] = Str::slug($data['sub_category']);
            }
            $data['user_id'] = Auth::user()->id;
            $data['sub_category_status'] ='Active';
            $data['id'] = null;
            $this->subCategoryContract->updateOrCreateSubCategory($data);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Sub Category created successfully!'
            ]);

        } catch (Exception $e) {

            DB::rollBack();

            Log::error('Error in subCategoryStore: ' . $e->getMessage());
            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return response()->json([
                'error' => true,
                'message' => 'Please try again!'
            ]);
        }
    }

    public function categoryEdit($id)
    {
        try {
            
            $category = $this->categoryContract->findCategoryById($id);

            if (!$category) {
                return response()->json(['error' => 'Category not found'], 404);
            }

            return response()->json($category);
            
        } catch (Exception $e) {
            
            Log::error('Error in categoryEdit: ' . $e->getMessage());
            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        }
    }
    public function subCategoryEdit($id)
    {
        try {
            
            $subCategory = $this->subCategoryContract->findSubCategoryById($id);
        
            if (!$subCategory) {
                return response()->json(['error' => 'SubCategory not found'], 404);
            }

            return response()->json($subCategory);
            
        } catch (Exception $e) {

            Log::error('Error in subCategoryEdit: ' . $e->getMessage());
            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function categoryUpdate(Request $request)
    {
        try {
            
            DB::beginTransaction();

            $data = $request->validate([
                'category' => 'required|string|max:255',
                'category_slug' => 'nullable|string|max:255|unique:categories,category_slug,' . $request->id,
                'category_status' => 'required|in:Active,Deactivate',
            ]);

            if (empty($data['category_slug'])) {
                $data['category_slug'] = Str::slug($data['category']);
            }

            $id = $request->id;
            if($id) {
                $data['id'] = $id;
                $this->categoryContract->updateOrCreateCategory($data);
            } else {
                $this->categoryContract->updateOrCreateCategory($data);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Category updated successfully!'
            ]);

        } catch (Exception $e) {

            DB::rollBack();

            Log::error('Error in categoryUpdate: ' . $e->getMessage());
            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        }
    }
    public function subCategoryUpdate(Request $request)
    {
        try {

            DB::beginTransaction();

            $data = $request->validate([
                'category_id' => 'required|exists:categories,id',
                'sub_category' => 'required|string|max:255',
                'description' => 'nullable|string',
                'sub_category_status' => 'required|in:Active,Deactivate',
            ]);
        
            if (empty($data['sub_category_slug'])) {
                $data['sub_category_slug'] = Str::slug($data['sub_category']);
            }
            $data['user_id'] = Auth::user()->id;
            $data['id'] = $request->id;

            $this->subCategoryContract->updateOrCreateSubCategory($data);
            
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Sub Category uodated successfully!'
            ]);

        } catch (Exception $e) {

            DB::rollBack();
        
            Log::error('Error in subCategoryStore: ' . $e->getMessage());
            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];
        
            return response()->json([
                'error' => true,
                'message' => 'Please try again!'
            ]);
        }
    }

    public function categoryDelete($id)
    {
        try {
            
            DB::beginTransaction();

            $this->categoryContract->deleteCategoryById($id);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Category deleted successfully!'
            ]);

        } catch (Exception $e) {
            
            DB::rollBack();
            
            Log::error('Error in categoryDelete: ' . $e->getMessage());

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        }
    }
    public function subCategoryDelete($id)
    {
        try {
            
            DB::beginTransaction();

            $this->subCategoryContract->deleteSubCategoryById($id);

            DB::commit();
            
            return response()->json([
                'success' => true,
                'message' => 'Category deleted successfully!'
            ]);

        } catch (Exception $e) {
            
            DB::rollBack();
            
            Log::error('Error in subCategoryDelete: ' . $e->getMessage());

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        }
    }
    public function getCategoryList()
    {
        try {
            $categories = $this->categoryContract->getCategorySelect();

            return response()->json([
                'success' => true,
                'categories' => $categories,
            ]);

        } catch (Exception $e) {
            Log::error('Error in getCategoryList: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error occurred: ' . $e->getMessage(),
            ], 500);
        }
    }
    public function getSubCategoryList()
    {
        try {
            $subCategories = $this->subCategoryContract->getSubCategorySelect();

            return response()->json([
                'success' => true,
                'subCategories' => $subCategories,
            ]);
            
        } catch (Exception $e) {
            Log::error('Error in getSubCategoryList: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error occurred: ' . $e->getMessage(),
            ], 500);
        }
    }
}
