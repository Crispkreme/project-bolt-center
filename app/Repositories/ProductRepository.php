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
}