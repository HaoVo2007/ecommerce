<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function viewCart() {

        $total = 0;

        if (Auth::check()) {

            $dbCart = Cart::with('product')->where('user_id', Auth::id())->get();
            $dbCartFormatted = $dbCart; 

            foreach ($dbCartFormatted as $item) {
                $total = $total + $item->product->price;
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
                ];
                
                $dbCartFormatted = $sessionCartFormatted->push($formattedItem);
            }

            
            foreach ($dbCartFormatted as $item) {
                $total = $total + $item->price;
            }

        }


    
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

        session()->forget('countCart');
        $product = Product::findOrFail($request->id);
        $quantity = (int) $request->quantity;
    
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
                ]);

                $countCart = Cart::where('user_id', Auth::id())
                    ->count();
                    
                session()->put('countCart', $countCart);
                
            }
        } else {

            $cart = session()->get('cart', []);

            if (isset($cart[$request->id])) {
                $cart[$request->id]['quantity'] += $quantity;
                $cart[$request->id]['price'] += $price;
            } else {
                $cart[$request->id] = [
                    'product_id' => $request->id,
                    'name' => $product->name,
                    'quantity' => $quantity,
                    'price' => $price,
                    'image_url' => $product->mainImage->image_url,
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

    public function deleteProductCart($id) {

        if (Auth::check()) {

            $cart = Cart::where('product_id', $id)
                        ->where('user_id', Auth::id())
                        ->first();

            $cart->delete();

            $cartQuantity = Cart::where('user_id', Auth::id())
                            ->count();

        } else {

            $sessionCart = session()->get('cart', []);

            unset($sessionCart[$id]);

            session()->put('cart', $sessionCart);

            $cartQuantity = count($sessionCart);

        }

        return response()->json([
            'status'=> 'success',
            'message' => trans('message.delete-product'),
            'quantity' => $cartQuantity,
        ]);
    }

    public function updateQuantityCart(Request $request, $id) {

        if (Auth::check()) {

            $cart = Cart::where('product_id', $id)
                        ->where('user_id', Auth::id())
                        ->first();
        
            if ( $cart ) { 

                if ($request->type == 1) {

                    $cart->quantity += 1;

                } else {

                    $cart->quantity = ($cart->quantity > 2) ? $cart->quantity - 1 : 1;

                }
        
                $cart->save();

            $data = $cart;

            }
        } else {

            $sessionCart = session()->get('cart', []);

            if ($request->type == 1) {
                
                $sessionCart[$id]['quantity'] = $sessionCart[$id]['quantity'] + 1;

            } else {

                if ($sessionCart[$id]['quantity'] > 2) {

                    $sessionCart[$id]['quantity'] = $sessionCart[$id]['quantity'] - 1;

                } else {

                    $sessionCart[$id]['quantity'] = 1;

                }    
            }

            session()->put('cart', $sessionCart);

            $data = session()->get('cart');
        }
        

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }
    
}
