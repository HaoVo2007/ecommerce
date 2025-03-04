<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function viewCart() {

        $total = 0;

        if (Auth::check()) {

            $dbCart = Cart::with('product.productSizes')->where('user_id', Auth::id())->get();
            $dbCartFormatted = $dbCart; 
            
            foreach ($dbCartFormatted as $item) {
                $total = $total + $item->price;
            }

        } else {

            $sessionCart = session()->get('cart', []);

            $sessionCartFormatted = collect();
            
            foreach ($sessionCart as $item) {
                $formattedItem = (object)[
                    'product_id' => $item['product_id'],
                    'name' => $item['name'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'image_url' => $item['image_url'] ?? null,
                    'size' => $item['size'],
                ];
                
                $dbCartFormatted = $sessionCartFormatted->push($formattedItem);
            }
            
            foreach ($dbCartFormatted as $item) {
                $total = $total + $item->price;
            }

        }

        // dd($dbCartFormatted);
    
        return view('home.cart.index', [
            'data' => $dbCartFormatted,
            'total' => $total,
        ]);

    }

    public function getCart() {

        if (Auth::check()) {

            $cart = Cart::with('product.mainImage')->where('user_id', Auth::id())->get();
            $quantity = $cart->count();
        } else {

            $sessionCart = session()->get('cart', []);

            $cart = [];

            foreach($sessionCart as $item) {

                $cart[] = $item; 

            }

            $quantity = count($cart);
        }

        return response()->json([
            'data' => $cart,
            'quantity' => $quantity,
        ]);
    }

    public function addToCart(Request $request) {

        $validator = Validator::make($request->all(), [
            'size'        => 'required|string|max:255',
            'quantity.*'=> 'integer|min:1',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => trans('message.enter-infor'),
                'error' => $validator->errors(),
            ], 422);
        }

        session()->forget('countCart');

        $product = Product::findOrFail($request->id);
        $quantity = (int) $request->quantity;
        $size = $request->size;

        if ($quantity <= 0) {
            return response()->json([
                'status' => 'error',
                'message' => trans('message.invalid-quantity')
            ], 400);
        }
    
        $price = $product->price * $quantity;
    
        if (Auth::check()) {
            $checkCart = Cart::where('product_id', $request->id)
                            ->where('user_id', Auth::id())
                            ->where('size', $size)
                            ->first();
            if ($checkCart) {

                $data = $checkCart->update([
                    'quantity' => $checkCart->quantity + $quantity,
                    'price' => $checkCart->price + $price,
                ]);

                $countCart = Cart::where('user_id', Auth::id())
                    ->count();
                    
            } else {

                $data = Cart::create([
                    'user_id' => Auth::id(),
                    'product_id' => $request->id,
                    'quantity' => $quantity,
                    'price' => $price,
                    'size' => $size,
                ]);

                $countCart = Cart::where('user_id', Auth::id())
                    ->count();
                    
                session()->put('countCart', $countCart);
                
            }
        } else {
            
            $productKey = $request->id . '_' . $size; 

            $cart = session()->get('cart', []);

            if (isset($cart[$productKey])) {
                $cart[$request->id]['quantity'] += $quantity;
                $cart[$request->id]['price'] += $price;
            } else {
                $cart[$productKey] = [
                    'product_id' => $request->id,
                    'name' => $product->name,
                    'quantity' => $quantity,
                    'price' => $price,
                    'image_url' => $product->mainImage->image_url,
                    'size' => $size,
                ];
            }
            
            session()->put('cart', $cart);
            $data = $cart;
            $countCart = count($cart);
            session()->put('countCart', $countCart);

        }

        return response()->json([
            'status' => 'success',
            'message' => trans('message.add-to-cart-message'),
            'data' => $data,
            'countCart' => $countCart,
        ]);
    }

    public function deleteProductCart(Request $request, $id) {

        $productKey = $id . '_' . $request->size; 

        if (Auth::check()) {

            $cart = Cart::where('product_id', $id)
                        ->where('user_id', Auth::id())
                        ->where('size', $request->size)
                        ->first();

            $cart->delete();

            $cartQuantity = Cart::where('user_id', Auth::id())
                            ->count();

        } else {

            $sessionCart = session()->get('cart', []);

            unset($sessionCart[$productKey]);

            session()->put('cart', $sessionCart);

            $cartQuantity = count($sessionCart);

            session()->put('countCart', $cartQuantity);

        }

        return response()->json([
            'status'=> 'success',
            'message' => trans('message.delete-product'),
            'quantity' => $cartQuantity,
        ]);
    }

    public function updateQuantityCart(Request $request, $id) {

        $size = $request->size;

        $productKey = $id . '_' . $size; 

        $originalPrice = Product::find($id)->price;

        if (Auth::check()) {

            $cart = Cart::where('product_id', $id)
                        ->where('user_id', Auth::id())
                        ->where('size', $size)
                        ->first();
        
            if ( $cart ) { 

                if ($request->type == 1) {

                    $cart->quantity += 1;

                } else {

                    $cart->quantity = ($cart->quantity > 2) ? $cart->quantity - 1 : 1;

                }

                $cart->price = $originalPrice * $cart->quantity;

                $cart->save();

            $data = $cart;

            }
        } else {

            $sessionCart = session()->get('cart', []);

            if ($request->type == 1) {
                
                $sessionCart[$productKey]['quantity'] = $sessionCart[$productKey]['quantity'] + 1;
                

            } else {

                if ($sessionCart[$productKey]['quantity'] > 2) {

                    $sessionCart[$productKey]['quantity'] = $sessionCart[$productKey]['quantity'] - 1;

                } else {

                    $sessionCart[$productKey]['quantity'] = 1;

                }    
            }

            $sessionCart[$productKey]['price'] = $originalPrice * $sessionCart[$productKey]['quantity'];

            session()->put('cart', $sessionCart);

            $data = $sessionCart[$productKey];
        }
        

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }
    
}
