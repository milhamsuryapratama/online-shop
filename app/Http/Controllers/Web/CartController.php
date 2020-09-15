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
    /**
     * Display cart page
     *
     */
    public function index()
    {
        $data['title'] = 'Cart - Online Shop';
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

    /**
     * Handle store data cart
     *
     */
    public function store(Request $request)
    {
        try {
            CartService::cekStock($request->all());
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

        return redirect()->to('cart');
    }

    /**
     * Handle delete data cart
     *
     */
    public function delete($id)
    {
        $cart = Cart::findOrFail($id);
        if ($cart->delete()) {
            return redirect()->back()->with(['success' => 'Delete cart successfully']);
        }

        return redirect()->back()->with(['error' => 'Failed to delete cart']);
    }

    public function change_qty(Request $request)
    {
        try {
            if ($request->ajax()) {
                return CartService::changeQty($request->all());
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
