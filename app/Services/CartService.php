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
    /**
     * Handle validate product stock when we adding cart
     *
     */
    public static function cekStock($data)
    {
        $product = Product::find($data['product_id']);
        $cart = Cart::whereProductId($data['product_id'])->whereUserId(Auth::id())->first();
        if ($product->stock < 2 OR $data['qty'] > $product->stock) {
            throw new Exception('Out of stock, stock minim !');
        } elseif (is_null($cart)) {
            return Cart::create([
                'product_id' => $data['product_id'],
                'qty' => $data['qty'],
                'user_id' => Auth::id()
            ]);
        }

        if (($data['qty'] + $cart->qty) > $product->stock) {
            throw new Exception('Failed to add cart !');
        }

        $cart->qty += $data['qty'];
        return $cart->update();
    }

    /**
     * Handle validation change qty at cart
     *
     */
    public static function changeQty($data)
    {
        $cart = Cart::whereProductId($data['product_id'])->whereUserId(Auth::id())->first();

        if (!is_null($data['action']) && $data['action'] == 'plus') {
            if (($cart->qty + 1) > $cart->product->stock) {
                throw new Exception('Out of stock !');
            }

            $newCart = CartRespository::updateQty($data['product_id'],Auth::id(),'plus');

        } else if (!is_null($data['action']) && $data['action'] == 'minus') {
            if (($cart->qty - 1) < 1) {
                throw new Exception('Out of stock !');
            }

            $newCart = CartRespository::updateQty($data['product_id'],Auth::id(),'minus');

        } else {
            if ($data['val'] > $cart->product->stock) {
                throw new Exception('Out of stock !');
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