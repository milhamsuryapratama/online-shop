@extends('admin/master')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                        <li class="breadcrumb-item active">Category</li>
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
                                Categories Data
                            </h3>
                        </div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categoryForm">
                            Add Category
                        </button>
                        <div class="card-body pad table-responsive">
                            <table class="table table-bordered table-sm table-striped text-center" id="category-table">
                                <thead>
                                    <th>NO</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @forelse($category as $c)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $c->category_name }}</td>
                                            <td>
                                                <button type="button" id="edit" data-id="{{ $c->id }}" data-name="{{ $c->category_name }}" data-route="{{ route('category.update', $c->id) }}" class="btn btn-primary btn-sm edit" data-toggle="modal" data-target="#categoryEdit">
                                                    Edit
                                                </button>
                                                <form action="{{ route('category.destroy', $c->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-rounded btn-icon" title="DELETE">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="1"></td>
                                            <td colspan="1">Data Not Found</td>
                                            <td></td>
                                        </tr>
                                    @endforelse
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

    <div class="modal fade" id="categoryForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('category.store') }}">
                        @csrf
                        <div class="form-group-sm">
                            <label for="categeory_name">Category Name</label>
                            <input type="text" class="form-control" name="category_name" id="categeory_name" placeholder="Enter Category Name" required>
                        </div>
                        <div class="form-group-sm">
                            <button type="submit" class="btn btn-primary btn-sm">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="categoryEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formEdit" method="POST" action="">
                        @csrf
                        @method('PUT')
                        <div class="form-group-sm">
                            <label for="categeory_name">Category Name</label>
                            <input type="text" class="form-control" name="category_name" id="categeory_name_edit" placeholder="Enter Category Name" required>
                        </div>
                        <div class="form-group-sm">
                            <button type="submit" class="btn btn-primary btn-sm">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function () {
            $("#category-table").DataTable();

            $(".edit").click(function () {
               $("#formEdit").attr('action', $(this).data('route'));
               $("#categeory_name_edit").val($(this).data('name'))
            });
        })
    </script>
@endpush