<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
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
}
