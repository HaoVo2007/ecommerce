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
        return view('admin.products.index');
    }

    public function viewAddProduct() {
        return view('admin.products.add_product');
    }

    public function getProduct(Request $request) {

        if ($request->keyWord) {
            $data = Product::with('productSizes', 'mainImage', 'subImage', 'category')
                          ->where('name', 'LIKE', '%'.$request->keyWord.'%')
                          ->paginate(5);
        } else  {
            $data = Product::with('productSizes', 'mainImage', 'subImage', 'category')
                         ->paginate(5);
        } 

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function addProduct(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'category'    => 'required',
            'type'    => 'required',
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
                'message' => trans('message.enter-infor'),
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
                'type' => $request->type,
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
                'message' => trans('message.add-product-success'),
                'product' => $product
            ]);
    
        } catch (\Throwable $th) {

            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => trans('message.add-product-fail'),
                'error' => $th->getMessage(),
            ], 500);

        }

    }

    public function editProduct(Request $request, $id) {

        $data = Product::with('productSizes', 'mainImage', 'subImage', 'category')->findOrFail($id);

        return view('admin.products.edit_product', ['data' => $data]);

    }

    public function updateProduct(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'category'    => 'required',
            'description' => 'nullable|string',
            'mainImage'   => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'subImages.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'sizes'       => 'required|array',
            'sizes.*'     => 'string|max:50',
            'quantities'  => 'required|array',
            'quantities.*'=> 'integer|min:1',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => trans('message.enter-infor'),
                'error' => $validator->errors(),
            ], 422);
        }

        DB::beginTransaction();

        try {
            
            $data = Product::findOrFail($id);

            $product = $data->update([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'category_id' => $request->category,
            ]);

            $subImageOld = $request->old_sub_images ?? [];
            $currentSubImages = ProductImage::where('product_id', $id)->where('image_main', 0)->get();
            
            if ($request->hasFile('mainImage')) {

                if ($data->mainImage) {

                    $oldMainImagePath = public_path('storage/' . $data->mainImage->image_url);

                    if (file_exists($oldMainImagePath)) {
                        unlink($oldMainImagePath);
                    }

                    $data->mainImage->delete();

                    $mainImagePath = $request->file('mainImage')->store('products', 'public');

                    ProductImage::create([
                        'product_id' => $data->id,
                        'image_url' => $mainImagePath,
                        'image_main' => 1
                    ]);

                }
            }

            foreach ($currentSubImages as $subImage) {
                if (!in_array($subImage->image_url, $subImageOld)) {
                    $subImagePath = public_path('storage/' . $subImage->image_url);
                    if (file_exists($subImagePath)) {
                        unlink($subImagePath);
                    }
                    $subImage->delete();
                }
            }

            if ($request->hasFile('subImages')) {
                foreach ($request->file('subImages') as $file) {
                    $subImagePath = $file->store('products', 'public');
                    ProductImage::create([
                        'product_id' => $data->id,
                        'image_url' => $subImagePath,
                        'image_main' => 0
                    ]);
                }
            }

            $sizes = $request->sizes;
            $quantities = $request->quantities;
            
            $data->productSizes()->delete();
            for($i = 0; $i < count($sizes); $i++) {
    
                ProductSize::create([
                    'product_id' => $data->id,
                    'size' => $sizes[$i],
                    'quantity' => $quantities[$i],
                ]);
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => trans('message.update-product-success'),
                'product' => $product
            ]);

        } catch (\Throwable $th) {

            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => trans('message.update-product-fail'),
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    public function deleteProduct(Request $request, $id) {

            $data = Product::findOrFail($id);

            if($data->productSizes()->exists()) {
                $data->productSizes()->delete();
            }

            if($data->mainImage) {
                if(file_exists(public_path('storage/' . $data->mainImage->image_url))) {
                    unlink(public_path('storage/' . $data->mainImage->image_url));
                }
                $data->mainImage->delete();
            }

            if ($data->subImage()->exists()) {
                foreach ($data->subImage as $subImage) {
                    if (file_exists(public_path('storage/' . $subImage->image_url))) {
                        unlink(public_path('storage/' . $subImage->image_url)); 
                    }
                    $subImage->delete(); 
                }
            }

            $data->delete();

        return response()->json([
            'status' => 'success',
            'message' => trans('message.delete-product')
        ]);

    }

    public function deleteAllProduct(Request $request) {

        if ($request->checkedIds) {
            
            foreach($request->checkedIds as $item) {

                $data = Product::findOrFail($item);

                if($data->productSizes()->exists()) {
                    $data->productSizes()->delete();
                }
        
                if($data->mainImage) {
                    if(file_exists(public_path('storage/' . $data->mainImage->image_url))) {
                        unlink(public_path('storage/' . $data->mainImage->image_url));
                    }
                    $data->mainImage->delete();
                }
        
                if ($data->subImage()->exists()) {
                    foreach ($data->subImage as $subImage) {
                        if (file_exists(public_path('storage/' . $subImage->image_url))) {
                            unlink(public_path('storage/' . $subImage->image_url)); 
                        }
                        $subImage->delete(); 
                    }
                }
        
                $data->delete();

            }

            return response()->json([
                'status' => 'success',
                'message' => trans('message.delete-product')
            ]);

        } else {
            return response()->json([
                'status' => 'error',
                'message' => trans('message.no-select-product')
            ]);
        }

    }
}
