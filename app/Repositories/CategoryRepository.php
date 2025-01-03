<?php

namespace App\Repositories;

use App\Contracts\CategoryContract;
use App\Models\Category;
use App\Models\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryRepository implements CategoryContract
{

    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function getAllCategory()
    {
        return $this->model->get()->map(function ($category) {
            $category->created_at = Carbon::parse($category->created_at)->format('d F Y');
            return $category;
        });
    }
}
