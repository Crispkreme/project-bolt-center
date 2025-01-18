<?php

namespace App\Http\Controllers;

use App\Contracts\CategoryContract;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    protected $categoryContract;

    public function __construct(
        CategoryContract $categoryContract,
    ) {
        $this->categoryContract = $categoryContract;
    }

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
                $this->categoryContract->updateOrCreateCategory($data);
            } else {
                $this->categoryContract->updateOrCreateCategory($data);
            }
            
            return redirect()->route('admin.category.list')->with('success', 'Category created successfully!');

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

    public function editCategory($id)
    {
        
        $category = $this->categoryContract->findCategoryById($id);

        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        return response()->json($category);
    }

    public function categoryUpdate(Request $request)
    {
        try {
            
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

            return redirect()->route('admin.category.list')->with('success', 'Category updated successfully!');
            
        } catch (Exception $e) {
            Log::error('Error in categoryUpdate: ' . $e->getMessage());
            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        }
    }
}
