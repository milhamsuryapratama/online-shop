@extends('web/master')

@section('content')
    <div class="slider-area">
        <!-- Slider -->
        <div class="block-slider block-slider4">
            <ul class="" id="bxslider-home4">
                @for($i = 0; $i < 2; $i++)
                    <li>
                        <img src="{{ asset('assets/photo/'.$product[$i]->picture) }}" alt="{{ $product[$i]->product_name }}" style="width: 195px">
                        <div class="caption-group">
                            <h2 class="caption title">
                                {{ $product[$i]->product_name }}
                            </h2>
{{--                            <h4 class="caption subtitle">Dual SIM</h4>--}}
                            <a class="caption button-radius" href="{{ URL::to('product/'.$product[$i]->slug) }}"><span class="icon"></span>Shop now</a>
                        </div>
                    </li>
                @endfor
            </ul>
        </div>
        <!-- ./Slider -->
    </div> <!-- End slider area -->

    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>30 Days return</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>Free shipping</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>Secure payments</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>New products</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if (session('verified'))
                        <div class="alert alert-success" role="alert">
                            {{ session('verified') }}
                        </div>
                    @endif
                    <div class="latest-product">
                        <h2 class="section-title">Latest Products</h2>
                        <div class="product-carousel">
                            @foreach($product as $p)
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="{{ asset('assets/photo/'.$p->picture) }}" alt="">
                                        <div class="product-hover">
                                            <a href="{{ URL::to('product/'.$p->slug) }}" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="{{ URL::to('product/'.$p->slug) }}">{{ $p->product_name }}</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>@currency($p->price)</ins>
                                    </div>
                                </div>
                            @endforeach
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
           if ('{{ session('verified') }}') {
               alert('Congrats, email has been verified')
           }
        });
    </script>
@endpush