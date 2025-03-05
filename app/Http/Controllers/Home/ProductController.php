<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function viewDetail($id) {

        session()->forget('countCart');
        $data = Product::with('productSizes', 'mainImage', 'subImage', 'category')->findOrFail($id);
        $avgReview = Review::where('product_id', $id)->avg('star');
        $starCounts = Review::where('product_id', $id)
            ->selectRaw('star, COUNT(*) as count')
            ->groupBy('star')
            ->pluck('count', 'star')
            ->toArray();

        $totalReviews = array_sum($starCounts);
        $starPercent = [];

        for($i = 1; $i <= 5; $i++) {
            $starPercent[$i] = $totalReviews > 0 ? round(($starCounts[$i] ?? 0) / $totalReviews * 100, 2) : 0;
        }

        if (Auth::check()) {
            $countCart = Cart::where('user_id', Auth::id())
                ->count();
        } else {
            $cart = session()->get('cart', []);
            $countCart = count($cart);
        }

        session()->put('countCart', $countCart);

        return view('home.products.detail', [
            'data' => $data,
            'avgReview' => round($avgReview, 2),
            'starPercent' => $starPercent,
            'countCart' => $countCart,
        ]);
    }

    public function getProduct(Request $request) {

        if ($request->type == 1) {
            $data = Product::with('productSizes', 'mainImage', 'subImage', 'category')
                ->inRandomOrder()
                ->limit(4)
                ->get();

        } else if ($request->type == 2) {

            $categoryId = Product::findOrFail($request->id)->category->id;

            $data = Product::with('productSizes', 'mainImage', 'subImage', 'category')
                        ->where('category_id', $categoryId)
                        ->where('id', '!=', $request->id)
                        ->limit(4)
                        ->get();

            if (!$data) {

                $data = Product::with('productSizes', 'mainImage', 'subImage', 'category')
                    ->inRandomOrder()
                    ->limit(4)
                    ->get();

            }
        }


        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function sendReviewProduct(Request $request) {

        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id', 
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'rating'     => 'required|integer|min:1|max:5', 
            'comment'    => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => trans('message.enter-infor'),
                'errors'  => $validator->errors(),
            ], 422);
        }

        $cleanData = [
            'product_id' => $request->product_id,
            'star'       => intval($request->rating),
            'name'       => strip_tags($request->name),  
            'email'      => filter_var($request->email, FILTER_SANITIZE_EMAIL),
            'comment'    => strip_tags($request->comment), 
        ];

        $review = Review::create($cleanData);

        return response()->json([
            'data'    => $review,
            'status'  => 'success',
            'message' => trans('message.send-review-success'),
        ]);
    }

    public function getReviewProduct(Request $request) {

        $productId = $request->product_id;

        $data = Review::where('product_id', $productId)->latest()->paginate(5);

        return response()->json([
            'data' => $data,
            'status' => 'success',
        ]);
    }
}
