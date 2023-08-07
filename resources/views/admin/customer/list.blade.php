@extends('admin.layouts.master')
@section('title')
    All Customer Details - {{ env('APP_NAME') }}
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
                        <h3 class="page-title">Users Information</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Users</a></li>
                            <li class="breadcrumb-item active">List</li>
                        </ul>
                    </div>
                    
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-0">Users Details</h4>
                            </div>

                        </div>
                    </div>

                    <hr />
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th> Name</th>
                                    <th> Email</th>
                                    <th> Phone</th>
                                    <th>
                                        No. of Invoice generate
                                    </th>
                                    <th> Status</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                               
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

        var table = $('#example').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('user.ajax.list') }}",
            columns: [{
                    data: 'first_name',
                    name: 'first_name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'invoice',
                    name: 'invoice'
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: false
                },
                
            ]
        });

    });
</script>

<script>
    $(document).on('change', '.toggle-class', function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var user_id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('user.status.change') }}',
            data: {
                'status': status,
                'user_id': user_id
            },
            success: function(resp) {
                console.log(resp.success)
            }
        });
    });
</script>
@endpush
 