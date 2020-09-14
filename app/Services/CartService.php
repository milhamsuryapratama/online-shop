<?php


namespace App\Services;


use App\Models\Cart;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Auth;

class CartService
{
    public static function cekStock($data)
    {
        $cart = Cart::whereProductId($data['product_id'])->whereUserId(Auth::id())->first();
        if (is_null($cart)) {
            return Cart::create([
                'product_id' => $data['product_id'],
                'qty' => $data['qty'],
                'user_id' => Auth::id()
            ]);
        }

        $product = Product::find($data['product_id']);
        if (($data['qty'] + $cart->qty) > $product->stock) {
            throw new Exception('Failed to add cart !');
        }

        $cart->qty += $data['qty'];
        return $cart->update();
    }

    public static function changeQty($data)
    {
        $cart = Cart::whereProductId($data['product_id'])->whereUserId(Auth::id())->first();
        if (!is_null($data['action']) && $data['action'] == 'plus') {
            if (($cart->qty + 1) > $cart->product->stock) {
                return response()->json([
                    'success' => 0,
                    'message' => 'Failed to add cart !'
                ], 400);
            }
            $cart->qty += 1;
            $cart->update();
        } else if (!is_null($data['action']) && $data['action'] == 'minus') {
            if (($cart->qty - 1) < 1) {
                return response()->json([
                    'success' => 0,
                    'message' => 'Failed to add cart !'
                ], 400);
            }
            $cart->qty -= 1;
            $cart->update();
        } else {
            if ($data['val'] > $cart->product->stock) {
                return response()->json([
                    'success' => 0,
                    'message' => 'Failed to add cart !'
                ], 400);
            }
            $cart->qty = $data['val'];
            $cart->update();
        }

        return response()->json([
            'success' => 1,
            'message' => 'Success',
            'data' => [
                'qty' => $cart->qty,
                'subtotal' => $cart->qty * $cart->product->price
            ]
        ], 200);
    }
}