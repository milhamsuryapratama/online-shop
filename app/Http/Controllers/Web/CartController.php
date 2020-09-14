<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $data['cart'] = Cart::with('product')->whereUserId(Auth::id())->get();
        return view('web/cart', $data);
//        return $data['cart']->sum('product.price');
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
