@extends('admin.layouts.master')
@section('title')
    {{ env('APP_NAME') }} Admin | Profile
@endsection
@push('styles')
@endpush

@section('content')
    <div class="page-wrapper">
        <!--page-content-wrapper-->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                    {{-- <div class="breadcrumb-title pe-3">Admin Profile</div> --}}
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">

                            </ol>
                        </nav>
                    </div>

                </div>
                <!--end breadcrumb-->
                <div class="user-profile-page">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-lg-7 border-right">
                                <div class="d-md-flex align-items-center">

                                    <div class="ms-md-4 flex-grow-1">
                                        <div class="d-flex align-items-center mb-1">
                                            <h4 class="mb-0">{{ Auth::user()->name }}</h4>
                                        </div>
                                        <p class="mb-0 text-muted">Admin</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--end row-->

                        <div class="tab-content mt-3">
                            <div class="tab-pane fade show active" id="Edit-Profile">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12 col-lg-5 border-right">
                                                    <form class="row g-3" action="{{ route('admin.profile.update') }}"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf

                                                        <div class="col-12">
                                                            <label class="form-label">Name</label>
                                                            <input type="text" value="{{ Auth::user()->first_name }}"
                                                                name="name" class="form-control">
                                                            @if ($errors->has('name'))
                                                                <div class="error" style="color:red;">
                                                                    {{ $errors->first('name') }}</div>
                                                            @endif
                                                        </div>
                                                        <div class="col-12">
                                                            <label class="form-label">Email</label>
                                                            <input type="text" value="{{ Auth::user()->email }}"
                                                                name="email" class="form-control">
                                                            @if ($errors->has('email'))
                                                                <div class="error" style="color:red;">
                                                                    {{ $errors->first('email') }}</div>
                                                            @endif
                                                        </div>
                                                        <div class="col-12">
                                                            <label class="form-label">Phone</label>
                                                            <input type="text" value="{{ Auth::user()->phone }}"
                                                                name="phone" class="form-control phone-format" placeholder="+1 123 456 7890">
                                                            @if ($errors->has('phone'))
                                                                <div class="error" style="color:red;">
                                                                    {{ $errors->first('phone') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="col-6">
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>

                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--end page-content-wrapper-->
    </div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.phone-format').mask('+1 999 999 9999');
        });
    </script>
@endpush
