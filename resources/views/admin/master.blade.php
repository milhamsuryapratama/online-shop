<!DOCTYPE html>
<html lang="en">
<head>
    <title>Online Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="{{ asset('assets/admin/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/admin/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/js/plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/js/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="/" class="brand-link">
{{--            <img src="#" alt="LOGO" class="brand-image elevation-3">--}}
            <span class="brand-text font-weight-bolder">ONLINE SHOP</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
{{--                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">--}}
{{--                    <li class="nav-item has-treeview">--}}
{{--                        <a href="/inventaris/" class="nav-link">--}}
{{--                            <i class="nav-icon fas fa-tachometer-alt"></i>--}}
{{--                            <p>Data Master<i class="right fas fa-angle-left"></i></p>--}}
{{--                        </a>--}}
{{--                        <ul class="nav nav-treeview">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{ route('category.index') }}" class="nav-link">--}}
{{--                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                    <p>Category</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="https://sarpra.herokuapp.com/" class="nav-link active">--}}
{{--                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                    <p>Product</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                </ul>--}}
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">Master Data</li>
                    <li class="nav-item">
                        <a href="{{ route('category.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>Categories</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('product.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-building"></i>
                            <p>Products</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL::to('admin/transaction') }}" class="nav-link">
                            <i class="nav-icon fas fa-building"></i>
                            <p>Transactions</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL::to('admin/logout') }}" class="nav-link">
                            <i class="nav-icon fas fa-building"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper">
        @yield('content')
    </div>

    <footer class="main-footer">
        <div class="float-right d-none d-sm-inline"></div>
        <small class="text-muted">&copy; 2020 Mrapa Developer. All right reserved.</small>
    </footer>
</div>

<script src="{{ asset('assets/admin/js/plugins/jquery/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/js/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/js/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/js/adminlte.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/js/plugins/dataTables/datatables.min.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
@stack('scripts')
</body>
</html>