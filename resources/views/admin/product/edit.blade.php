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
                                    <input type="number" id="price" name="price" class="form-control" value="{{ $product->price }}" required>
                                    <small style="color: red">
                                        {{ $errors ? $errors->first('price') : '' }}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <input type="number" id="stock" name="stock" class="form-control" value="{{ $product->stock }}" required>
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
                                    <label for="picture">Change Picture (if needed)</label>
                                    <input type="file" id="picture" name="picture" class="form-control" required>
                                    <small style="color: red">
                                        {{ $errors ? $errors->first('picture') : '' }}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save</button>
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
        });
    </script>
@endpush