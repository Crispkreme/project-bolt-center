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
                'product_slug'      => 'nullable|string|unique:products,product_slug|max:100',
            ]);
            $productData['user_id'] = $userId;
            $productData['id'] = null;

            $product = $this->productContract->updateOrCreateProduct($productData);

            $stockData = $request->validate([
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
            
            $productImageData = $request->validate([
                'product_image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);        
            
            if ($request->hasFile('product_image')) {
                $imagePaths = [];
                foreach ($request->file('product_image') as $file) {
                    $imagePath = $file->store('product_images', 'public');
                    $imagePaths[] = $imagePath;
                }
                $productImageData['product_id'] = $product->id;
                
                foreach ($imagePaths as $imagePath) {
                    $this->productImageContract->updateOrCreateProductImage($productImageData);
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Product and images saved successfully!',
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
}
