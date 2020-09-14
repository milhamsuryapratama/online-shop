<?php


namespace App\Services;


use App\Models\Cart;
use App\Models\Product;
use App\Repositories\CartRespository;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

            $newCart = CartRespository::updateQty($data['product_id'],Auth::id(),'plus');

        } else if (!is_null($data['action']) && $data['action'] == 'minus') {
            if (($cart->qty - 1) < 1) {
                return response()->json([
                    'success' => 0,
                    'message' => 'Failed to add cart !'
                ], 400);
            }

            $newCart = CartRespository::updateQty($data['product_id'],Auth::id(),'minus');

        } else {
            if ($data['val'] > $cart->product->stock) {
                return response()->json([
                    'success' => 0,
                    'message' => 'Failed to add cart !'
                ], 400);
            }

            $newCart = CartRespository::updateQty($data['product_id'],Auth::id(),'', $data['val']);
        }

        $total = CartRespository::getTotal();

        return response()->json([
            'success' => 1,
            'message' => 'Success',
            'data' => [
                'qty' => $newCart->qty,
                'subtotal' => $newCart->qty * $newCart->product->price,
                'total' => $total
            ]
        ], 200);
    }
}