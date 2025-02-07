<?php

namespace App\Http\Controllers;

use App\Contracts\StockAdjustmentContract;
use App\Contracts\StockContract;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StockController extends Controller
{
    protected $stockContract;
    protected $stockAdjustmentContract;

    public function __construct(
        StockContract $stockContract,
        StockAdjustmentContract $stockAdjustmentContract,
    ) {
        $this->stockContract = $stockContract;
        $this->stockAdjustmentContract = $stockAdjustmentContract;
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
            
            $stockAdjustments = $this->stockAdjustmentContract->getAllStockAdjustment();

            return view('pages.admin.stocks.stock-adjustment', [
                'stockAdjustments' => $stockAdjustments,
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
    public function addStock(Request $request)
    {
        try {
            
            DB::beginTransaction();
            
            $userId = Auth::id();
            $stockData = $request->validate([
                'supplier_id' => 'required|exists:entities,id',
                'discount_type' => 'required|string|in:Percentage,Cash',
                'discount' => 'nullable|numeric',
                'products' => 'required|array',
                'products.*.id' => 'required|exists:products,id',
                'products.*.quantity' => 'required|integer|min:1',
                'products.*.selling_price' => 'nullable|numeric|min:0',
                'products.*.buying_price' => 'nullable|numeric|min:0',
                'products.*.quantity_alert' => 'nullable|integer|min:0',
            ]);

            foreach ($stockData['products'] as $productId => $product) {
                $productAvailable = $this->stockContract->getStockById($product['id']);

                $stockAdjustmentData = [
                    'editor_id' => $userId,
                    'stock_id' => $productAvailable->stock_id,
                ];
                $this->stockAdjustmentContract->updateOrCreateStockAdjustment($stockAdjustmentData);

                $newQuantity = $productAvailable->quantity + $product['quantity'];
                $stockEntry = [
                    'id' => $productAvailable->stock_id,
                    'user_id' => $userId,
                    'product_id' => $product['id'],
                    'quantity' => $newQuantity,
                    'selling_price' => $product['selling_price'] ?? 0,
                    'buying_price' => $product['buying_price'] ?? 0,
                    'supplier_id' => $stockData['supplier_id'],
                    'discount_type' => $stockData['discount_type'],
                    'discount' => $stockData['discount'] ?? 0,
                    'quantity_alert' => $product['quantity_alert'] ?? 0,
                ];
                $this->stockContract->updateOrCreateStock($stockEntry);
            }

            DB::commit();
            
            return response()->json([
                'success' => true, 
            ]);

        } catch (Exception $e) {
            
            DB::rollBack();

            Log::error('Error in addStock: ' . $e->getMessage());

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        } 
    }
}
