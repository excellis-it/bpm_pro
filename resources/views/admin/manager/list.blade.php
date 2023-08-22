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
                        <h3 class="page-title">Managers Information</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">List</li>
                        </ul>
                    </div>
                     <div class="col-auto float-end ms-auto">
                        <a href="{{ route('managers.create') }}" class="btn add-btn"><i class="fa fa-plus"></i> Add
                            Manager</a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th> Name</th>
                                    <th> Email</th>
                                    <th> Status</th>
                                    <th> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($managers as $manager)
                                <tr>
                                    <td>{{ $manager->first_name }} {{ $manager->last_name }}</td>
                                    <td>{{ $manager->email }}</td>
                                    <td>
                                        <div class="button-switch">
                                            <input type="checkbox" id="switch-orange" class="switch toggle-class"
                                                data-id="{{ $manager->id }}"
                                                {{ $manager->status ? 'checked' : '' }} />
                                            <label for="switch-orange" class="lbl-off"></label>
                                            <label for="switch-orange" class="lbl-on"></label>
                                        </div>
                                    </td>
                                    <td align="center">
                                        <a href="{{route('edit.manager', $manager->id)}}"><i class="fas fa-edit"></i></a> 
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
        $('#example').DataTable({
            "aaSorting": [],
            "columnDefs": [{
                "orderable": false,
                "targets": [ 2,3]
            },
            {
                "orderable": true,
                "targets": [0,1]
            }
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
 