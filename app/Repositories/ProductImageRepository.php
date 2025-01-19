<?php

namespace App\Repositories;

use App\Contracts\ProductImageContract;
use App\Models\ProductImage;
use App\Models\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductImageRepository implements ProductImageContract
{

    protected $model;

    public function __construct(ProductImage $model)
    {
        $this->model = $model;
    }

    public function updateOrCreateProductImage($data)
    {
        return $this->model->updateOrCreate(
            [
                'id' => $data['id'] ?? null,
            ],
            [
                'product_id' => $data['product_id'],
                'product_image' => $data['product_image'],
                'created_at' => Carbon::now(),
            ]
        );
    }
}
