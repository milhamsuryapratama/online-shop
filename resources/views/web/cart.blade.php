@extends('web.master')

@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="#">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>
                        </div>
                    </div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Recent Posts</h2>
                        <ul>
                            <li><a href="#">Sony Smart TV - 2015</a></li>
                            <li><a href="#">Sony Smart TV - 2015</a></li>
                            <li><a href="#">Sony Smart TV - 2015</a></li>
                            <li><a href="#">Sony Smart TV - 2015</a></li>
                            <li><a href="#">Sony Smart TV - 2015</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form method="GET" action="{{ URL::to('checkout') }}">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cart as $c)
                                        <tr class="cart_item">
                                            <td class="product-remove">
                                                <a title="Remove this item" class="remove" onclick="return confirm('Are you sure?')" href="{{ URL::to('cart/delete/'.$c->id) }}">×</a>
                                            </td>

                                            <td class="product-thumbnail">
                                                <a href="{{ URL::to('product/'.$c->product->slug) }}">
                                                    <img width="145" height="145" alt="{{ $c->product->product_name }}" class="shop_thumbnail" src="{{ asset('assets/photo/'.$c->product->picture) }}">
                                                </a>
                                            </td>

                                            <td class="product-name">
                                                <a href="{{ URL::to('product/'.$c->product->slug) }}">
                                                    {{ $c->product->product_name }}
                                                </a>
                                            </td>

                                            <td class="product-price">
                                                <span class="amount">{{ $c->product->price }}</span>
                                            </td>

                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    <input type="button" class="minus" data-id="{{ $c->product->id }}" value="-">
                                                    <input type="text" size="2" data-id="{{ $c->product->id }}" class="input-text qty" title="Qty" value="{{ $c->qty }}" min="0" step="1">
                                                    <input type="button" class="plus" data-id="{{ $c->product->id }}" value="+">
                                                </div>
                                            </td>

                                            <td class="product-subtotal">
                                                <span class="subtotal">
                                                    {{ $c->qty * $c->product->price }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td class="actions" colspan="6">
                                            <input type="submit" value="Checkout" name="proceed" class="checkout-button button alt wc-forward">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>

                            <div class="cart-collaterals">

                                <div class="cart_totals ">
                                    <h2>Cart Totals</h2>

                                    <table cellspacing="0">
                                        <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="total">{{ $total[0]->total }}</span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function () {
            $(".plus").click(function () {
                let row = $(this).closest('tr');
                let id = $(this).data('id');

                changeQty(id, 'plus', row);
            });

            $(".minus").click(function () {
                let row = $(this).closest('tr');
                let id = $(this).data('id');

                changeQty(id, 'minus', row);
            });

            $(".qty").keyup(function () {
                let row = $(this).closest('tr');
                let id = $(this).data('id');

                changeQty(id, null, row, $(this).val());
            })
        });

        function changeQty(product_id, action, row, val = null) {
            if (val != '') {
                $.ajax({
                    url: '{{ URL::to('cart/change_qty') }}',
                    type: 'POST',
                    data: {
                        'product_id': product_id,
                        'action': action,
                        'val': val
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response, statusText, xhr) {
                        if (xhr.status == 200) {
                            row.find('.qty').val(response.data.qty);
                            $(".total").html(response.data.total[0].total);
                            row.find('.subtotal').html(response.data.subtotal)
                        }
                    },
                    error: function (error) {
                        console.log(error)
                    }
                })
            }
        }
    </script>
@endpush