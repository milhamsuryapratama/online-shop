@extends('admin.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Transaction Detail</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Transaction Detail</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Success!</h5>
                            {{ session('success') }}
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Error!</h5>
                            {{ session('error') }}
                        </div>
                    @endif
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> Online Shop
                                    <small class="float-right">
                                        Created: {{ \Carbon\Carbon::parse($detail->created_at)->format('d M, Y') }}</small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-6 invoice-col">
                                Address :
                                <address>{{ $detail->getAddress() }}</address>
                            </div>

                            <div class="col-sm-6 invoice-col">
                                <b>Transaction Code: PROVO-{{ $detail->id }}</b><br>
                                <b>Status:</b> {{ $detail->status}}<br>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Subtotal</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($detail->details as $d)
                                            <tr>
                                                <td>{{ $d->product->product_name }}</td>
                                                <td>{{ $d->qty }}</td>
                                                <td>@currency($d->price)</td>
                                                <td>@currency($d->sub_total)</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                                {{--                                <p class="lead">Payment Methods:</p>--}}
                                {{--                                <img src="../../dist/img/credit/visa.png" alt="Visa">--}}
                                {{--                                <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">--}}
                                {{--                                <img src="../../dist/img/credit/american-express.png" alt="American Express">--}}
                                {{--                                <img src="../../dist/img/credit/paypal2.png" alt="Paypal">--}}

                                {{--                                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">--}}
                                {{--                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya--}}
                                {{--                                    handango imeem--}}
                                {{--                                    plugg--}}
                                {{--                                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.--}}
                                {{--                                </p>--}}
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                <p class="lead">Review:</p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <th>Total :</th>
                                            <td>
                                                @currency($detail->total)
                                            </td>
                                        </tr>
                                        <tr>
                                            @if($detail->status != 'delivered')
                                                <td>
                                                    <form method="POST" action="{{ URL::to('admin/transaction/delivered/'.$detail->id) }}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary float-right" onclick="return confirm('Are you sure ?')">Delivered Order ?</button>
                                                    </form>
                                                </td>
                                            @endif
                                            <td>
                                                <a data-target="#modal-file" data-toggle="modal" class="btn btn-primary float-right" style="margin-right: 5px;">See Payment Prof</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

    <div class="modal fade" id="modal-file">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Payment Prof</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(is_null($detail->file))
                        <p style="text-align: center">Nothing file</p>
                    @else
                        <img src="{{ asset('assets/order_confirm/'.$detail->file) }}">
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection