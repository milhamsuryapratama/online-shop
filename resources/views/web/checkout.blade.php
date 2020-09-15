@extends('web.master')

@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form method="post" action="#">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                    <tr>
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
                                                <span class="amount">@currency($c->product->price)</span>
                                            </td>

                                            <td class="product-quantity">
                                                <span class="amount">{{ $c->qty }}</span>
                                            </td>

                                            <td class="product-subtotal">
                                                <span class="subtotal">
                                                    @currency($c->qty * $c->product->price)
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
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
                                            <td><span class="total">@currency($total[0]->total)</span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="col2-set" id="customer_details">
                        <div class="col-2">
                            <div class="woocommerce-shipping-fields">
                                <h3 id="ship-to-different-address">
                                    <label class="checkbox" for="ship-to-different-address-checkbox">Ship to a address?</label>
                                </h3>

                                <form method="POST" action="{{ URL::to('checkout/store') }}">
                                    @csrf
                                    <div class="shipping_address" style="display: block;">

                                        <p id="shipping_first_name_field" class="form-row form-row-first validate-required">
                                            <label class="" for="shipping_first_name">Name <abbr title="required" class="required">*</abbr>
                                            </label>
                                            <input type="text" value="{{ Auth::user()->name }}" placeholder="" id="shipping_first_name" name="shipping_first_name" class="input-text" readonly>
                                        </p>

                                        <div class="clear"></div>

                                    </div>

                                    <p id="shipping_province_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row-wide address-field validate-required">
                                        <label class="" for="province">Province <abbr title="required" class="required">*</abbr>
                                        </label>
                                        <input type="text" value="" placeholder="Province" id="province" name="province" class="input-text" required>
                                        <small style="color: red">{{ $errors ? $errors->first('province') : '' }}</small>
                                    </p>

                                    <p id="shipping_city_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row-wide address-field validate-required">
                                        <label class="" for="city">City <abbr title="required" class="required">*</abbr>
                                        </label>
                                        <input type="text" value="" placeholder="City" id="city" name="city" class="input-text" required>
                                        <small style="color: red">{{ $errors ? $errors->first('city') : '' }}</small>
                                    </p>

                                    <p id="shipping_postcode_field" class="form-row form-row-last address-field validate-required validate-postcode" data-o_class="form-row form-row-last address-field validate-required validate-postcode">
                                        <label class="" for="postcode">Postcode <abbr title="required" class="required">*</abbr>
                                        </label>
                                        <input type="text" value="" placeholder="Postcode / Zip" id="postcode" name="postcode" class="input-text" required>
                                        <small style="color: red">{{ $errors ? $errors->first('postcode') : '' }}</small>
                                    </p>

                                    <p id="order_comments_field" class="form-row notes">
                                        <label class="" for="order_comments">Addess</label>
                                        <textarea cols="5" rows="2" placeholder="Input your shiping address" id="address" class="input-text " name="address"></textarea>
                                        <small>Example : Dusun Paleran RT 11 RW 03 Desan Maron Wetan Kecamatan Maron Kabupaten Probolinggo</small>
                                        <small style="color: red">{{ $errors ? $errors->first('address') : '' }}</small>
                                    </p>

                                    <div class="form-row place-order">
                                        <input type="submit" data-value="Place order" value="Place order" id="place_order" name="woocommerce_checkout_place_order" class="button alt">
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection