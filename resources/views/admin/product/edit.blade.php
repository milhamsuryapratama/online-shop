@extends('admin/master')


@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                        <li class="breadcrumb-item active">Add Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-data"></i>
                                Edit Product Data
                            </h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input type="text" id="name" name="product_name" class="form-control" value="{{ $product->product_name }}" required>
                                    <small style="color: red">
                                        {{ $errors ? $errors->first('product_name') : '' }}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control" name="category">
                                        @foreach($category as $c)
                                            @if($c->id == $product->category_id)
                                                <option value="{{ $c->id }}" selected>{{ $c->category_name }}</option>
                                            @else
                                                <option value="{{ $c->id }}">{{ $c->category_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" id="price" name="price" class="form-control" value="{{ $product->price }}" required>
                                    <small style="color: red">
                                        {{ $errors ? $errors->first('price') : '' }}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <input type="text" id="stock" name="stock" class="form-control" value="{{ $product->stock }}" required>
                                    <small style="color: red">
                                        {{ $errors ? $errors->first('stock') : '' }}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description">{{ $product->description }}</textarea>
                                    <small style="color: red">
                                        {{ $errors ? $errors->first('description') : '' }}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="picture">
                                        Change Picture (if needed) | <a data-target="#modal-picture" data-toggle="modal" href="#">Current Picture</a>
                                    </label>
                                    <input type="file" id="picture" name="picture" class="form-control">

                                    <small style="color: red">
                                        {{ $errors ? $errors->first('picture') : '' }}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <button type="button" class="btn btn-danger" onclick="return self.history.back()">Cancle</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="modal-picture">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Current Picture</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(is_null($product->picture))
                        <p style="text-align: center">Nothing file</p>
                    @else
                        <img src="{{ asset('assets/photo/'.$product->picture) }}">
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function () {
            tinymce.init({
                selector: '#description'
            });

            $("#stock").keypress(function (event) {
                if (event.which != 8 && isNaN(String.fromCharCode(event.which))) {
                    event.preventDefault();
                }
            })

            $("#price").keypress(function (event) {
                if (event.which != 8 && isNaN(String.fromCharCode(event.which))) {
                    event.preventDefault();
                }
            })
        });
    </script>
@endpush