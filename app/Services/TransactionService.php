<?php


namespace App\Services;


use App\Models\Transaction;

class TransactionService
{
    /**
     * Handle validate payment process at transaction
     *
     */
    public static function validatePayment($id)
    {
        $transaction = Transaction::findOrFail($id);
        if ($transaction->payment_process != 'Y') {
            throw new \Exception('Cannot delivered, this order has not been paid yet');
        }

        $transaction->status = 'delivered';
        if ($transaction->save()) {
            return $transaction;
        }
    }
}