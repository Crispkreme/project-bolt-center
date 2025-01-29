<?php

namespace App\Repositories;

use App\Contracts\StockContract;
use App\Models\Stock;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StockRepository implements StockContract
{

    protected $model;

    public function __construct(Stock $model)
    {
        $this->model = $model;
    }
    
    public function updateOrCreateStock($data)
    {
        return $this->model->updateOrCreate(
            [
                'id' => $data['id'] ?? null,
            ],
            [
                'product_id' => $data['product_id'],
                'user_id' => $data['user_id'],
                'supplier_id' => $data['supplier_id'],
                'quantity' => $data['quantity'] ?? 0,
                'selling_price' => $data['selling_price'] ?? 0,
                'buying_price' => $data['buying_price'] ?? 0,
                'discount' => $data['discount'],
                'quantity_alert' => $data['quantity_alert'],
                'discount_type' => $data['discount_type'] ?? 'Percentage',
                'updated_at' => Carbon::now(),
            ]
        );
    }

    public function getAllStock()
    {
        $data = $this->model
            ->leftJoin('products', 'stocks.product_id', '=', 'products.id')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
            ->leftJoin('users', 'stocks.user_id', '=', 'users.id')
            ->leftJoin('entities', 'stocks.supplier_id', '=', 'entities.id')
            ->select(
                'stocks.id',
                'products.product as product_name',
                'products.description',
                'products.product_code',
                'categories.category as category_name',
                'sub_categories.sub_category as sub_category_name',
                'stocks.quantity',
                'stocks.selling_price',
                'stocks.buying_price',
                'stocks.discount',
                'entities.name as supplier',
                'entities.profile as supplier_profile',
                'users.role as created_by',
                'stocks.created_at'
            )
            ->get();

        $data->transform(function ($item) {
            $item->created_on = Carbon::parse($item->created_at)->format('F j, Y');
            unset($item->created_at);
            return $item;
        });

        return $data;
    }
}