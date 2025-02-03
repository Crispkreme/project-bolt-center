<?php

namespace App\Contracts;

interface StockAdjustmentContract {

    public function getAllStockAdjustment();
    public function updateOrCreateStockAdjustment($data);
}
