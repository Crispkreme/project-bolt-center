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

    public function getAllCategory($perPage = 10)
    {
        $data = DB::table('categories')->paginate($perPage);

        $data->transform(function ($item) {
            $item->created_at = Carbon::parse($item->created_at)->format('F j, Y');
            return $item;
        });

        return $data;
    }

    public function updateOrCreateCategory($data)
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

    public function findCategoryById($id)
    {
        return DB::table('categories')->find($id);
    }

    public function deleteCategoryById($id)
    {
        return DB::table('categories')->where('id', $id)->delete();;
    }
}
