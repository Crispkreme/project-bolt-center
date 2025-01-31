<?php

namespace App\Contracts;

interface StockContract {

    public function updateOrCreateStock($data);
    public function getAllStock();
    public function getStockById($id);
}