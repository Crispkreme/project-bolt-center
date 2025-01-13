<?php

namespace App\Repositories;

use App\Contracts\SubCategoryContract;
use App\Models\SubCategory;
use App\Models\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            ->select(
                'categories.category',
                'sub_categories.sub_category',
                'categories.category_slug',
                'sub_categories.sub_category_slug',
                'sub_categories.description',
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
                'category' => $data['category'],
                'category_slug' => $data['category_slug'],
                'category_status' => $data['category_status'],
                'created_at' => Carbon::now(),
            ]
        );
    }
}
