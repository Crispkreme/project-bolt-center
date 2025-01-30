<?php

namespace App\Http\Controllers;

use App\Contracts\StockContract;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StockController extends Controller
{
    protected $stockContract;

    public function __construct(
        StockContract $stockContract,
    ) {
        $this->stockContract = $stockContract;
    }

    public function stockList()
    {
        try {
            
            $stocks = $this->stockContract->getAllStock();

            return view('pages.admin.stocks.stock-list', [
                'stocks' => $stocks,
            ]);
            
        } catch (Exception $e) {

            Log::error('Error in getSupplierSelect: ' . $e->getMessage());

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        } 
    }
    public function lowStockList()
    {
        try {
            
            $stocks = $this->stockContract->getAllStock();
            
            return view('pages.admin.stocks.stock-low-list', [
                'stocks' => $stocks,
            ]);
            
        } catch (Exception $e) {

            Log::error('Error in getSupplierSelect: ' . $e->getMessage());

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        } 
    }
    public function stockAdjustmentList()
    {
        try {
            
            $stocks = $this->stockContract->getAllStock();
            
            return view('pages.admin.stocks.stock-adjustment', [
                'stocks' => $stocks,
            ]);
            
        } catch (Exception $e) {

            Log::error('Error in getSupplierSelect: ' . $e->getMessage());

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        } 
    }
}
