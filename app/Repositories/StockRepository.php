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
}