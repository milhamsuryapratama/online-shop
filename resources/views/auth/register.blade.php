@extends('web/master')

@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Register</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container" style="width: 30%;">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                    <small style="color: red">{{ $errors ? $errors->first('name') : '' }}</small>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                    <small style="color: red">{{ $errors ? $errors->first('email') : '' }}</small>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" id="password" class="form-control">
                    <small style="color: red">{{ $errors ? $errors->first('password') : '' }}</small>
                    <small id="lblError" style="color: red"></small>
                </div>
                <div class="form-group">
                    <label>Password Confirmation</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="register">Register</button>
                    <a href="{{ route('login') }}">Login ?</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function () {
            $("#password").keyup(function (e) {
                let password = $(this).val();
                var letters = /^[a-zA-Z0-9]+$/;

                var result = letters.test(password);

                if (result) {
                    $("#lblError").html("");
                    $("#register").prop('disabled', false);
                    return;
                } else {
                    $("#register").prop('disabled', true);
                    $("#lblError").html("Password must be alphanumeric");
                }
            });
        });
    </script>
@endpush
