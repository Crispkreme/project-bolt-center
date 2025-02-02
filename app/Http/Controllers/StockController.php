<?php

namespace App\Http\Controllers;

use App\Contracts\StockContract;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function addStock(Request $request)
    {
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

        foreach ($stockData['products'] as $product) {

            $stockData['user_id'] = Auth::user()->id;
            $stockData['product_id'] = $product['id'];
            $stockData['quantity'] = $product['quantity'];
            $stockData['selling_price'] = $product['selling_price'];
            $stockData['buying_price'] = $product['buying_price'];

            $productAvailable = $this->stockContract->getStockById($product['id']);
            if ($productAvailable) {

                $stockData['id'] = $productAvailable->id;
                $this->stockContract->updateOrCreateStock($stockData);

            } else {
                $this->stockContract->updateOrCreateStock($stockData);
            }
        }

        return response()->json(['success' => true, 'message' => 'Stock added successfully']);
    }
}
