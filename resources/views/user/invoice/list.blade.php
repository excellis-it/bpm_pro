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
    <div class="page-wrapper invoice_page">

        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">List of Invoices</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">List </a></li>
                            
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
                    <!--<div class="card-title">-->
                    <!--    <div class="row">-->
                    <!--        <div class="col-md-6">-->
                    <!--            <h4 class="mb-0">List of Invoicess</h4>-->
                    <!--        </div>-->

                    <!--    </div>-->
                    <!--</div>-->

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
                                    <th>Send In</th>
                                    <th>Stop Sending</th>
                                    <th>Invoice</th>
                                    <th>Action</th>
                                    <th>Clone</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user_invoices as $invoice)
                                <tr>
                                    <td>{{ $invoice->bil_to_name }}</td>
                                    <td>{{ $invoice->bil_to_email }}</td>
                                    <td>{{ $invoice->bil_to_address }}</td>
                                    <td>{{ $invoice->bil_to_phone }}</td>
                                    <td>${{ number_format($invoice->total, 2) }}</td>
                                    <td>
                                        @if($invoice->send_id == 1)
                                         One Time
                                        @elseif($invoice->send_id == 2)
                                        Weekly
                                        @else
                                        Monthly
                                        @endif
                                    </td>
                                    <td>
                                        @if($invoice->send_id != 1)
                                        <div class="button-switch">
                                            
                                            <input type="checkbox" id="switch-orange" class="switch toggle-class"
                                                data-id="{{ $invoice['id'] }}"
                                                {{ $invoice['send_in_status'] ? 'checked' : '' }} />
                                            <label for="switch-orange" class="lbl-off"></label>
                                            <label for="switch-orange" class="lbl-on"></label>
                                        </div>
                                        @endif
                                    </td>
                                    <td><a href="{{ route('download.invoice', $invoice->id) }}" ><i class="fas fa-download"></i></a></td>
                                    <td>
                                        <a href="{{ route('invoice.edit', $invoice->id) }}" ><i class="fas fa-edit"></i></a> &nbsp; &nbsp; 
                                        <a href="{{ route('invoice.show', $invoice->id) }}" ><i class="fas fa-eye"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('invoice.clone', $invoice->id) }}" ><i class="fas fa-clone"></i></a>
                                    </td>
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
<script>
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{route("invoice.change-status")}}',
            data: {
                'status': status,
                'id': id
            },
            success: function(resp) {
                console.log(resp.success)
            }
        });
    });
</script>
@endpush
