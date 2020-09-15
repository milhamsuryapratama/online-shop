<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaidRequest;
use App\Models\Transaction;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class OrderController extends Controller
{
    /**
     * Display orders page
     *
     */
    public function index()
    {
        $data['order'] = Transaction::orderBy('created_at', 'DESC')->whereUserId(Auth::id())->paginate(3);
        return view('web/order', $data);
    }

    /**
     * Display payment form page
     *
     */
    public function pay(Request $request)
    {
        $id = $request->query('code');
        $data['payment'] = Transaction::findOrFail($id);
        return view('web/pay', $data);
    }

    /**
     * Handle change payment status
     *
     */
    public function paid(PaidRequest $paidRequest)
    {
        $paidRequest->validated();

        OrderRepository::saveFile($paidRequest);
        return redirect()->to('orders')->with('success', 'Congratulations, your payment has been received');
    }
}
