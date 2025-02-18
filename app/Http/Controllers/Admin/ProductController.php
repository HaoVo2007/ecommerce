<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function viewProduct() {
        return view('admin.products.product');
    }

    public function viewAddProduct() {
        return view('admin.products.add_product');
    }

    public function getProduct() {

        $data = Product::with('productSizes', 'mainImage', 'subImage', 'category')->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Get data successfully',
            'data' => $data,
        ]);
    }

    public function addProduct(Request $request) {

        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'category'    => 'required',
            'description' => 'nullable|string',
            'mainImage'   => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'subImages.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'sizes'       => 'required|array',
            'sizes.*'     => 'string|max:50',
            'quantities'  => 'required|array',
            'quantities.*'=> 'integer|min:1',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Please enter complete information',
                'error' => $validator->errors(),
            ], 422);
        }

        DB::beginTransaction();

        try {

            $product = Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'category_id' => $request->category,
            ]);
    
            if($request->hasFile('mainImage')) {
    
                $mainImagePath = $request->file('mainImage')->store('products', 'public');
    
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_url' => $mainImagePath,
                    'image_main' => 1,
                ]); 
            }
    
            if($request->hasFile('subImages')) {
    
                foreach($request->file('subImages') as $subImage) {
    
                    $subImagePath = $subImage->store('products', 'public');
    
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_url' => $subImagePath,
                        'image_main' => 0,
                    ]);
                }
            }
    
            $sizes = $request->sizes;
            $quantities = $request->quantities;
    
            for($i = 0; $i < count($sizes); $i++) {
    
                ProductSize::create([
                    'product_id' => $product->id,
                    'size' => $sizes[$i],
                    'quantity' => $quantities[$i],
                ]);
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Product added successfully',
                'product' => $product
            ]);
    
        } catch (\Throwable $th) {

            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to add product',
                'error' => $th->getMessage(),
            ], 500);

        }

    }
}
