<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Mail\OrderEmail;
use App\Models\Cart;
use App\Repositories\CartRespository;
use App\Repositories\CheckoutRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function index()
    {
        $data['cart'] = Cart::whereUserId(Auth::id())->get();
        $data['total'] = CartRespository::getTotal();
        return view('web/checkout', $data);
    }

    public function store(CheckoutRequest $checkoutRequest)
    {
        $checkoutRequest->validated();

        $total = CartRespository::getTotal();
        $cart = Cart::whereUserId(Auth::id())->get();

        $transaction = CheckoutRepository::store($checkoutRequest, $total, $cart);
        Mail::to('nsyclda@gmail.com')->send(new OrderEmail($transaction, $cart));
        return redirect()->to('orders')->with('success', 'Congratulations, your order with the code PROVO-'.$transaction->id.' has been successfully placed');
    }
}
