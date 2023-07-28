@extends('user.layouts.master')
@section('title')
    Customer Invoice - {{ env('APP_NAME') }}
@endsection
@push('styles')
<style>
    .dataTables_filter{
        margin-bottom: 10px !important;
    }
</style>
@endpush

@section('content')
    @php
        use App\Models\User;
    @endphp
    <section id="loading">
        <div id="loading-content"></div>
    </section>
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Users Invoice</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Users Invoice</a></li>
                            <li class="breadcrumb-item active">List</li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <a href="{{ route('invoice.create') }}" class="btn add-btn"><i class="fa fa-plus"></i> Add
                            Invoice</a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-0">Users Invoices</h4>
                            </div>

                        </div>
                    </div>

                    <hr />
                    <div class="table-responsive">
                        <table id="myTable" class="dd table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Bill To Name</th>
                                    <th>Bill To Email</th>
                                    <th>Bill To Address</th>
                                    <th>Bill To Phone </th>
                                    <th>Total Amount</th>
                                    <th>Invoice</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user_invoices as $invoice)
                                <tr>
                                    <td>{{ $invoice->bil_to_name }}</td>
                                    <td>{{ $invoice->bil_to_email }}</td>
                                    <td>{{ $invoice->bil_to_address }}</td>
                                    <td>{{ $invoice->bil_to_phone }}</td>
                                    <td>{{ $invoice->total }}</td>
                                    <td><a href="{{ route('download.invoice', $invoice->id) }}" ><i class="fas fa-download"></i></a></td>
                                </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@push('scripts')
   
<script>
    $(document).ready(function() {
        //Default data table
        $('#myTable').DataTable({
            "aaSorting": [],
            "columnDefs": [{
                    "orderable": false,
                    "targets": [5]
                },
                {
                    "orderable": true,
                    "targets": [0, 1, 2, 3, 4]
                }
            ]
        });

    });
</script>
@endpush
