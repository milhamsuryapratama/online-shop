@extends('web.master')

@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Orders</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if(session('success'))
                        <div class="woocommerce-info">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                <tr>
                                    <th class="product-name">NO</th>
                                    <th class="product-name">Transaction Code</th>
                                    <th class="product-price">Total</th>
                                    <th class="product-quantity">Created</th>
                                    <th class="product-subtotal">Status</th>
                                    <th class="product-subtotal">Payment Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order as $o)
                                    <tr class="cart_item">
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td class="product-name">
                                            PROVO-{{ $o->id }}
                                        </td>

                                        <td class="product-price">
                                            <span class="amount">{{ $o->total }}</span>
                                        </td>

                                        <td class="product-quantity">
                                            {{ $o->created_at }}
                                        </td>

                                        <td class="product-subtotal">
                                            <span class="amount">{{ $o->status }}</span>
                                        </td>

                                        <td class="product-subtotal">
                                            <span class="amount">
                                                @if($o->payment_process == 'Y')
                                                    Paid
                                                @else
                                                    <a href="{{ URL::to('orders/pay?code='.$o->id) }}">Pay Now</a>
                                                @endif
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td class="actions" colspan="6">
                                        {{ $order->links() }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection