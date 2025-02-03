<?php

namespace App\Repositories;

use App\Contracts\StockAdjustmentContract;
use App\Models\StockAdjustment;
use App\Models\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StockAdjustmentRepository implements StockAdjustmentContract
{

    protected $model;

    public function __construct(StockAdjustment $model)
    {
        $this->model = $model;
    }

    public function getAllStockAdjustment()
    {
        $data = $this->model
            ->leftJoin('stocks', 'stock_adjustments.stock_id', '=', 'stocks.id')
            ->leftJoin('products', 'stocks.product_id', '=', 'products.id')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
            ->leftJoin('users as stock_creator', 'stocks.user_id', '=', 'stock_creator.id')
            ->leftJoin('users as stock_editor', 'stock_adjustments.editor_id', '=', 'stock_editor.id')
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
                'stock_editor.email as editor',
                'entities.profile as supplier_profile',
                'stock_creator.role as created_by',
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

    public function updateOrCreateStockAdjustment($data)
    {
        return $this->model->updateOrCreate(
            [
                'id' => $data['id'] ?? null,
            ],
            [
                'editor_id' => $data['editor_id'],
                'stock_id' => $data['stock_id'],
                'created_at' => Carbon::now(),
            ]
        );
    }
}
