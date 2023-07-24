@extends('user.layouts.master')
@section('title')
    Dashboard - {{ env('APP_NAME') }} user
@endsection
@push('styles')
@endpush

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome User!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>

    </div>
@endsection

@push('scripts')
@endpush
