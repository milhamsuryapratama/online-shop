<?php


namespace App\Repositories;


use App\Models\Transaction;
use App\Models\Transaction_Details;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutRepository
{
    public static function store($data, $total, $cart)
    {
        DB::beginTransaction();
        try {
            $transaction = new Transaction();
            $transaction->user_id = Auth::id();
            $transaction->total = $total[0]->total;
            $transaction->province = $data['province'];
            $transaction->city = $data['city'];
            $transaction->postcode = $data['postcode'];
            $transaction->address = $data['address'];

            if ($transaction->save()) {
                foreach ($cart as $c) {
                    Transaction_Details::create([
                        'transaction_id' => $transaction->id,
                        'product_id' => $c->product_id,
                        'qty' => $c->qty,
                        'price' => $c->product->price,
                        'sub_total' => $c->qty * $c->product->price
                    ]);
                }
                CartRespository::deleteCart();
                DB::commit();
                return $transaction;
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}