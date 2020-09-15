<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>{{ $title }}</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet'
          type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/web/css/bootstrap.min.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/web/css/font-awesome.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/web/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/responsive.css') }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user-menu">
                    <ul>
                        <li><a href="#"><i class="fa fa-user"></i> My Account</a></li>
                        <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
                        <li><a href="#"><i class="fa fa-user"></i> My Cart</a></li>
                        <li><a href="#"><i class="fa fa-user"></i> Checkout</a></li>
                        <li><a href="#"><i class="fa fa-user"></i> Login</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="header-right">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">
                                <span class="key">Hi :</span>
                                <span class="value">{{ Auth::check() ? Auth::user()->name : 'there' }} </span><b
                                        class="caret"></b></a>
                            <ul class="dropdown-menu">
                                @if(Auth::check())
                                    <li><a href="{{ URL::to('cart') }}">Cart</a></li>
                                    <li><a href="{{ URL::to('orders') }}">Order</a></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit">Logout</button>
                                        </form>
                                    </li>
                                @else
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End header area -->

<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="{{ URL::to('/') }}"><img src="{{ asset('assets/web/img/logo.png') }}"></a></h1>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="shopping-item">
                    <a href="{{ URL::to('cart') }}">Cart - <span
                                class="cart-amunt">{{ !is_null($cartHead) ? $cartHead[0]->total : 0 }}</span> <i
                                class="fa fa-shopping-cart"></i> <span
                                class="product-count">{{ !is_null($cartHead) ? $cartHead[0]->count : 0 }}</span></a>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End site branding area -->

<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}"><a href="{{ URL::to('/') }}">Home</a></li>
                    <li class="{{ Route::currentRouteName() == 'cart' ? 'active' : '' }}"><a href="{{ URL::to('cart') }}">Cart</a></li>
                    <li class="{{ Route::currentRouteName() == 'orders' ? 'active' : '' }}"><a href="{{ URL::to('orders') }}">Orders</a></li>
                </ul>
            </div>
        </div>
    </div>
</div> <!-- End mainmenu area -->

@yield('content')

<div class="footer-top-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="footer-about-us">
                    <h2>u<span>Stora</span></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam
                        laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure
                        eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis
                        magni at?</p>
                    <div class="footer-social">
                        <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">User Navigation </h2>
                    <ul>
                        <li><a href="#">My account</a></li>
                        <li><a href="#">Order history</a></li>
                        <li><a href="#">Wishlist</a></li>
                        <li><a href="#">Vendor contact</a></li>
                        <li><a href="#">Front page</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Categories</h2>
                    <ul>
                        <li><a href="#">Mobile Phone</a></li>
                        <li><a href="#">Home accesseries</a></li>
                        <li><a href="#">LED TV</a></li>
                        <li><a href="#">Computer</a></li>
                        <li><a href="#">Gadets</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-newsletter">
                    <h2 class="footer-wid-title">Newsletter</h2>
                    <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your
                        inbox!</p>
                    <div class="newsletter-form">
                        <form action="#">
                            <input type="email" placeholder="Type your email">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End footer top area -->

<div class="footer-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="copyright">
                    <p>&copy; 2015 uCommerce. All Rights Reserved.
                        <a href="http://www.freshdesignweb.com" target="_blank">freshDesignweb.com</a>
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="footer-card-icon">
                    <i class="fa fa-cc-discover"></i>
                    <i class="fa fa-cc-mastercard"></i>
                    <i class="fa fa-cc-paypal"></i>
                    <i class="fa fa-cc-visa"></i>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End footer bottom area -->

<script src="https://code.jquery.com/jquery.min.js"></script>

<!-- Bootstrap JS form CDN -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- jQuery sticky menu -->
<script src="{{ asset('assets/web/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/web/js/jquery.sticky.js') }}"></script>

<!-- jQuery easing -->
<script src="{{ asset('assets/web/js/jquery.easing.1.3.min.js') }}"></script>

<!-- Main Script -->
<script src="{{ asset('assets/web/js/main.js') }}"></script>

<!-- Slider -->
<script type="text/javascript" src="{{ asset('assets/web/js/bxslider.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/web/js/script.slider.js') }}"></script>
@stack('scripts')
</body>
</html>