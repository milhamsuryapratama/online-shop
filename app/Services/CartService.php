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
}