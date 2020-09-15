@extends('admin.master')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Transaction</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                        <li class="breadcrumb-item active">Transaction</li>
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
                                Transaction Data
                            </h3>
                        </div>
                        <div class="card-body pad table-responsive">
                            <table class="table table-bordered table-sm table-striped text-center" id="transaction-table">
                                <thead>
                                <th>NO</th>
                                <th>Transaction Code</th>
                                <th>User</th>
                                <th>Total</th>
                                <th>Created</th>
                                <th>Status</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($transaction as $t)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>PROVO-{{ $t->id }}</td>
                                            <td>{{ $t->user->name }}</td>
                                            <td>@currency($t->total)</td>
                                            <td>{{ \Carbon\Carbon::parse($t->created_at)->format('d M, Y') }}</td>
                                            <td>{{ $t->status }}</td>
                                            <td>
                                                <a href="{{ URL::to('admin/transaction/data/'.$t->id) }}" class="btn btn-primary">Detail</a>
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
           $("#transaction-table").DataTable();
        });
    </script>
@endpush