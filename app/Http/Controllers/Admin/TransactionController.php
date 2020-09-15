<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Services\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $data['transaction'] = Transaction::all();
        return view('admin/transaction/index', $data);
    }

    public function detail($id)
    {
        $data['detail'] = Transaction::with(['details', 'details.product'])->findOrFail($id);
        return view('admin/transaction/detail', $data);
    }

    public function delivered($id)
    {
        try {
            TransactionService::validatePayment($id);
            return redirect()->back()->with('success', 'Order has been delivered');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Cannot delivered, this order has not been paid yet');
        }
    }
}
