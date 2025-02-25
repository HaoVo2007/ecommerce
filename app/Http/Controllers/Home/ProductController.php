<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function viewDetail($id) {

        $data = Product::with('productSizes', 'mainImage', 'subImage', 'category')->findOrFail($id);

        return view('home.products.detail', compact('data'));
    }

    public function getProduct(Request $request) {

        if ($request->type == 1) {
            $data = Product::with('productSizes', 'mainImage', 'subImage', 'category')
            ->inRandomOrder()
            ->limit(4)
            ->get();
        }


        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }
}
