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
        $data = DB::table('categories')->paginate($perPage);

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
                'description' => $data['description'] ?? null,
                'created_at' => Carbon::now(),
            ]
        );
    }
}
