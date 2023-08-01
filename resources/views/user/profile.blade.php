@extends('user.layouts.master')
@section('title')
    {{ env('APP_NAME') }} User | Profile
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
                            <div class="row">
                                <div class="col-12 col-lg-7 border-right">
                                    <div class="d-md-flex align-items-center">
                                        <div class="mb-md-0 mb-3">
                                            @if (!Auth::user()->logo)
                                                <a href="{{ asset('frontend_assets/img/logo.png') }}" target="_blank">
                                                    <img src="{{ asset('frontend_assets/img/logo.png') }}"
                                                        class="rounded-circle shadow" width="130" height="130"
                                                        alt="" /></a>
                                            @else
                                                <a href="{{ Storage::url(Auth::user()->logo) }}" target="_blank">
                                                    <img src="{{ Storage::url(Auth::user()->logo) }}"
                                                        class="rounded-circle shadow" width="130" height="130"
                                                        alt=""></a>
                                            @endif
                                        </div>
                                        <div class="ms-md-4 flex-grow-1">
                                            <div class="d-flex align-items-center mb-1">
                                                <h4 class="mb-0">{{ Auth::user()->name }}</h4>
                                            </div>
                                            <p class="mb-0 text-muted">User</p>
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
                                                        <form class="row g-3" action="{{ route('user.profile.update') }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf

                                                            <div class="col-12">
                                                                <label class="form-label">Name<span style="color: red;">*</span></label>
                                                                <input type="text" value="{{ Auth::user()->name }}"
                                                                    name="name" class="form-control">
                                                                @if ($errors->has('name'))
                                                                    <div class="error" style="color:red;">
                                                                        {{ $errors->first('name') }}</div>
                                                                @endif
                                                            </div>
                                                            <div class="col-12">
                                                                <label class="form-label">Email<span style="color: red;">*</span></label>
                                                                <input type="text" value="{{ Auth::user()->email }}"
                                                                    name="email" class="form-control">
                                                                @if ($errors->has('email'))
                                                                    <div class="error" style="color:red;">
                                                                        {{ $errors->first('email') }}</div>
                                                                @endif
                                                            </div>
                                                            <div class="col-12">
                                                                <label class="form-label">Phone<span style="color: red;">*</span></label>
                                                                <input type="text" value="{{ Auth::user()->phone }}"
                                                                    name="phone" class="form-control">
                                                                @if ($errors->has('phone'))
                                                                    <div class="error" style="color:red;">
                                                                        {{ $errors->first('phone') }}</div>
                                                                @endif
                                                            </div>

                                                            <div class="col-12">
                                                                <label class="form-label">State<span
                                                                        style="color: red;">*</span></label>
                                                                <select class="form-control" name="state">
                                                                    @foreach ($states as $state)
                                                                        <option value="{{ $state->name }}"
                                                                            @if (Auth::user()->state == $state->name) selected @endif>
                                                                            {{ $state->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="col-12">
                                                                <label class="form-label">City<span
                                                                        style="color: red;">*</span></label>
                                                                    <input type="text" class="form-control"
                                                                        id="inputPassword3" name="city" value="{{ Auth::user()->city }}"
                                                                        placeholder="City">
                                                            </div>

                                                            <div class="col-12">
                                                                <label class="form-label">Address<span style="color: red;">*</span></label>
                                                                <textarea name="address" class="form-control">{{ Auth::user()->address }}</textarea>
                                                                @if ($errors->has('address'))
                                                                    <div class="error" style="color:red;">
                                                                        {{ $errors->first('address') }}</div>
                                                                @endif
                                                            </div>

                                                            <div class="col-12">
                                                                <label class="form-label">Gst<span style="color: red;">*</span></label>
                                                                <input type="text" value="{{ Auth::user()->gst }}"
                                                                    name="gst" class="form-control">
                                                                @if ($errors->has('gst'))
                                                                    <div class="error" style="color:red;">
                                                                        {{ $errors->first('gst') }}</div>
                                                                @endif
                                                            </div>

                                                            <div class="col-12">
                                                                <label class="form-label">Logo<span style="color: red;">*</span></label>
                                                                <input type="file" name="logo"
                                                                    class="form-control">
                                                                @if ($errors->has('logo'))
                                                                    <div class="error" style="color:red;">
                                                                        {{ $errors->first('logo') }}</div>
                                                                @endif
                                                            </div>

                                                            <div class="col-6">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Update</button>
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
    @endpush
