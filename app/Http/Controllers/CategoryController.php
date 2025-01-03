<?php

namespace App\Http\Controllers;

use App\Contracts\CategoryContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }
        
        $categories = $this->categoryContract->getAllCategory();

        return view('admin.categories.index', [
            'categories' => $categories,
        ]);
    }
}
