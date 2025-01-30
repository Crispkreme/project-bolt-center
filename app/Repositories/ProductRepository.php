<?php

namespace App\Repositories;

use App\Contracts\ProductContract;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductRepository implements ProductContract
{

    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function checkProductItemCode($data)
    {
        return $this->model->where('product_code', $data)->exists();
    }  
    
    public function updateOrCreateProduct($data)
    {
        return $this->model->updateOrCreate(
            [
                'id' => $data['id'] ?? null,
            ],
            [
                'category_id' => $data['category_id'],
                'sub_category_id' => $data['sub_category_id'],
                'user_id' => $data['user_id'],
                'product' => $data['product'],
                'product_slug' => $data['product_slug'] ?? Str::slug($data['product']),
                'description' => $data['description'] ?? null,
                'product_code' => $data['product_code'],
                'updated_at' => Carbon::now(),
            ]
        );
    }

    public function getAllProduct()
    {
        $data = $this->model->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
            ->leftJoin('users', 'products.user_id', '=', 'users.id')
            ->select(
                'products.id',
                'products.product',
                'categories.category as category',
                'sub_categories.sub_category as sub_category',
                'products.description',
                'products.product_code',
                'users.role as created_by',
                'products.created_at'
            )
            ->get();
    
        $data->transform(function ($item) {
            $item->created_on = Carbon::parse($item->created_at)->format('F j, Y');
            unset($item->created_at);
            return $item;
        });
    
        return $data;
    }

    public function deleteProductById($id)
    {
        return $this->model->where('id', $id)->delete();
    }
}