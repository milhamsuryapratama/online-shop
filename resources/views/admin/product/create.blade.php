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
                                Add Product Data
                            </h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input type="text" id="name" name="product_name" class="form-control" value="{{ old('product_name') }}" required>
                                    <small style="color: red">
                                        {{ $errors ? $errors->first('product_name') : '' }}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control" name="category">
                                        @foreach($category as $c)
                                            <option value="{{ $c->id }}">{{ $c->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" id="price" name="price" class="form-control" value="{{ old('price') }}" min="1" step="1" required>
                                    <small style="color: red">
                                        {{ $errors ? $errors->first('price') : '' }}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <input type="text" id="stock" name="stock" class="form-control" value="{{ old('stock') }}" min="1" step="1" required>
                                    <small style="color: red">
                                        {{ $errors ? $errors->first('stock') : '' }}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
                                    <small style="color: red">
                                        {{ $errors ? $errors->first('description') : '' }}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="picture">Picture</label>
                                    <input type="file" id="picture" name="picture" class="form-control" required>
                                    <small style="color: red">
                                        {{ $errors ? $errors->first('picture') : '' }}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-danger" onclick="return self.history.back()">Cancle</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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