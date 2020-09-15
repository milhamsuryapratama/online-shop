<?php


namespace App\Repositories;


use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartRespository
{

    public static function updateQty($product_id, $user_id, $action, $val = null)
    {
        $cart = Cart::whereProductId($product_id)->whereUserId($user_id)->first();
        if ($action == 'plus') {
            $cart->qty += 1;
        } elseif ($action == 'minus') {
            $cart->qty -= 1;
        } else {
            $cart->qty = $val;
        }

        $cart->update();
        return $cart;
    }

    public static function getTotal()
    {
        return Cart::join('products', 'products.id', '=', 'carts.product_id')
            ->where('carts.user_id', Auth::id())
            ->get(DB::raw('SUM(carts.qty * products.price) as total'));
    }

    public static function deleteCartByUserId() {
        return Cart::whereUserId(Auth::id())->delete();
    }
}