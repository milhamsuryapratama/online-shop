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
}
