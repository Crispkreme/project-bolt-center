<?php

namespace App\Http\Controllers;

use App\Contracts\ProductContract;
use App\Contracts\ProductImageContract;
use App\Contracts\StockContract;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $productContract;
    protected $stockContract;
    protected $productImageContract;

    public function __construct(
        ProductContract $productContract,
        StockContract $stockContract,
        ProductImageContract $productImageContract,
    ) {
        $this->productContract = $productContract;
        $this->stockContract = $stockContract;
        $this->productImageContract = $productImageContract;
    }

    public function checkUniqueItemCode(Request $request)
    {
        $isUnique = $this->productContract->checkProductItemCode($request->product_code);
        return response()->json(['is_unique' => $isUnique]);
    }

    public function productStore(Request $request)
    {
        try {
            $userId = Auth::user()->id;

            $productData = $request->validate([
                'category_id'       => 'nullable|exists:categories,id',
                'sub_category_id'   => 'nullable|exists:sub_categories,id',
                'user_id'           => 'nullable|exists:users,id',
                'product'           => 'required|string|max:255',
                'description'       => 'nullable|string|max:1000',
                'product_code'      => 'nullable|string|unique:products,product_code|max:100',
                'product_slug'      => 'nullable|string|max:100',
            ]);
            $productData['user_id'] = $userId;

            if (empty($productData['product_code'])) {
                do {
                    $productData['product_code'] = 'PRD-' . random_int(100000000, 999999999);
                } while ($this->productContract->checkProductItemCode($productData['product_code']));
            }

            $product = $this->productContract->updateOrCreateProduct($productData);

            $stockData = $request->validate([
                'supplier_id'      => 'nullable|exists:entities,id',
                'quantity'         => 'nullable|numeric|min:0',
                'selling_price'    => 'nullable|numeric|min:0',
                'buying_price'     => 'nullable|numeric|min:0',
                'discount'         => 'nullable|numeric|min:0',
                'quantity_alert'   => 'nullable|numeric|min:0',
                'discount_type'    => 'required|in:Percentage,Cash',
            ]);
            $stockData['user_id'] = $userId;
            $stockData['product_id'] = $product->id;

            $this->stockContract->updateOrCreateStock($stockData);
            
            if ($request->hasFile('product_image')) {
                foreach ($request->file('product_image') as $file) {
                    $imagePath = $file->store('product_images', 'public');
            
                    $this->productImageContract->updateOrCreateProductImage([
                        'product_id'    => $product->id,
                        'product_image' => $imagePath,
                    ]);
                }
            }            

            return response()->json([
                'success' => true,
                'message' => 'Product saved successfully!',
            ]);

        } catch (Exception $e) {
            Log::error('Error in productStore: ' . $e->getMessage());

            return response()->json([
                'error' => true,
                'message' => 'Please try again!',
            ]);
        }
    }

    public function getProductList()
    {
        try {
            
            $products = $this->productContract->getAllProduct();
            
            return view('pages.admin.products.product-list', [
                'products' => $products,
            ]);

        } catch (Exception $e) {

            Log::error('Error in getProductList: ' . $e->getMessage());

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        } 
    }

    public function addProduct()
    {
        return view('pages.admin.products.add-product');
    }
}
