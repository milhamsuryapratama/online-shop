@extends('web/master')

@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
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
                        <h2 class="sidebar-title">Search Product</h2>
                        <form action="">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                        @foreach($other_product as $p)
                            <div class="thubmnail-recent">
                                <img src="{{ asset('assets/photo/'.$p->picture) }}" class="recent-thumb" alt="">
                                <h2><a href="{{ URL::to('product/'.$p->slug) }}">{{ $p->product_name }}</a></h2>
                                <div class="product-sidebar-price">
                                    <ins>@currency($p->price)</ins>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

                <div class="col-md-8">
                    @if(session('error'))
                        <div class="woocommerce-info">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="">Home</a>
                            <a href="">Category Name</a>
                            <a href="">{{ $product->product_name }}</a>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="{{ asset('assets/photo/'.$product->picture) }}" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name">{{ $product->product_name }}</h2>
                                    <div class="product-inner-price">
                                        <ins>@currency($product->price)</ins> | Stock : {{ $product->stock }}
                                    </div>

                                    <form method="POST" action="{{ URL::to('cart') }}" class="cart">
                                        @csrf
                                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" id="qty" title="Qty" value="1" name="qty" min="1" step="1">
                                        </div>
                                        <button class="add_to_cart_button" type="submit">Add to cart</button>
                                    </form>

                                    <div class="product-inner-category">
                                        <p>Category: <a href="">{{ $product->category->category_name }}</a>. </p>
                                    </div>

                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>

                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Product Description</h2>
                                                <p>{!! $product->description !!}</p>
                                            </div>
                                        </div>
                                    </div>

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
           $("#qty").keyup(function () {
                if (isNaN($(this).val())) {
                    alert('Negative');
                }
           });
        });
    </script>
@endpush    