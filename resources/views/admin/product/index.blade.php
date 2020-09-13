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
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i> Error!</h5>
                            {{ $errors ? $errors->first('category_name') : '' }}
                        </div>
                    @elseif(session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Success!</h5>
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-data"></i>
                                Product Data
                            </h3>
                        </div>
                        <a class="btn btn-primary" href="{{ route('product.create') }}">
                            Add Product
                        </a>
                        <div class="card-body pad table-responsive">
                            <table class="table table-bordered table-sm table-striped text-center" id="product-table">
                                <thead>
                                <th>NO</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($product as $p)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $p->product_name }}</td>
                                            <td>{{ $p->price }}</td>
                                            <td>
                                                <a href="{{ route('product.edit', $p->id) }}" class="btn btn-primary">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        $(function () {
           $("#product-table").DataTable();
        });
    </script>
@endpush