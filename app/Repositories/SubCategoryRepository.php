<?php

namespace App\Repositories;

use App\Contracts\SubCategoryContract;
use App\Models\Log;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubCategoryRepository implements SubCategoryContract
{

    protected $model;

    public function __construct(SubCategory $model)
    {
        $this->model = $model;
    }

    public function getAllSubCategory($perPage = 10)
    {
        $data = DB::table('sub_categories')
            ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
            ->join('users', 'sub_categories.user_id', '=', 'users.id')
            ->select(
                'sub_categories.id',
                'categories.category',
                'sub_categories.sub_category',
                'sub_categories.sub_category_slug',
                'sub_categories.description',
                'sub_categories.sub_category_status',
                'users.role',
                'sub_categories.created_at'
            )
            ->paginate($perPage);

        $data->transform(function ($item) {
            $item->created_at = Carbon::parse($item->created_at)->format('F j, Y');
            return $item;
        });

        return $data;
    }
    
    public function updateOrCreateSubCategory($data)
    {
        return $this->model->updateOrCreate(
            [
                'id' => $data['id'] ?? null,
            ],
            [
                'category_id' => $data['category_id'],
                'user_id' => $data['user_id'],
                'sub_category' => $data['sub_category'],
                'sub_category_slug' => $data['sub_category_slug'] ?? Str::slug($data['sub_category']),
                'description' => $data['description'] ?? null,
                'sub_category_status' => $data['sub_category_status'] ?? 'Active',
                'updated_at' => Carbon::now(),
            ]
        );
    }

    public function findSubCategoryById($id)
    {
        return DB::table('sub_categories')->find($id);
    }

    public function deleteSubCategoryById($id)
    {
        return DB::table('sub_categories')->where('id', $id)->delete();;
    }

    public function getSubCategory()
    {
        return DB::table('sub_categories')->get();
    }
}
