@extends('web.master')

@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Pay Order</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container" style="width: 30%;">
            <form method="POST" action="{{ URL::to('orders/paid') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $payment->id }}">
                <div class="form-group">
                    <label>Transaction Code</label>
                    <input type="text" name="transaction_id" id="transaction_id" class="form-control" value="PROVO-{{ $payment->id }}" readonly>
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $payment->user->name }}" readonly>
                </div>
                <div class="form-group">
                    <label>Total</label>
                    <input type="text" name="total" id="total" class="form-control" value="{{ $payment->total }}" readonly>
                </div>
                <div class="form-group">
                    <label>Bukti</label>
                    <input type="file" name="file" id="file" class="form-control" required>
                    <small style="color: red">{{ $errors ? $errors->first('file') : '' }}</small>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection