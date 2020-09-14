<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Repositories\CartRespository;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $data['cart'] = Cart::whereUserId(Auth::id())->get();
//        $cart = Cart::join('products', 'products.id', '=', 'carts.product_id')
//            ->where('carts.user_id', Auth::id())
//            ->get([
//                'carts.*',
//                'products.*',
//                DB::raw('SUM(carts.qty * products.price) as total')
//            ]);
        $data['total'] = CartRespository::getTotal();
        return view('web/cart', $data);
    }

    public function store(Request $request)
    {
        try {
            CartService::cekStock($request->all());
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

        return redirect()->to('cart');
    }

    public function delete($id)
    {
        $cart = Cart::findOrFail($id);
        if ($cart->delete()) {
            return redirect()->back();
        }
    }

    public function change_qty(Request $request)
    {
        try {
            if ($request->ajax()) {
                return CartService::changeQty($request->all());
            }
        } catch (\Exception $e) {
            return $e;
        }
    }

}
