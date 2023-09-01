@extends('admin.layouts.master')
@section('title')
{{ env('APP_NAME') }} | Create Manager
@endsection
@push('styles')
@endpush

@section('content')
<div class="page-wrapper">

    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Create</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Manager</li>
                    </ul>
                </div>
                <div class="col-auto float-end ms-auto">
                        <a href="{{ route('managers.index') }}" class="btn add-btn"><i class="fa fa-arrow"></i> Manage
                            Manager</a>
                    </div>
               
            </div>
        </div>

        <div class="card create-mng">
            <div class="card-body">
                <div class="card-title">
                    <div class="row">
                    <div class="col-xl-12 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('managers.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="border p-4 rounded">
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label">First name <span style="color: red;">*</span></label>
                                                <input type="text" name="first_name" id="" class="form-control" value="{{ old('first_name') }}" placeholder="Enter first name">
                                                @if($errors->has('first_name'))
                                                <div class="error" style="color:red;">{{ $errors->first('first_name') }}</div>
                                                @endif
                                            </div>
                                             <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label">Last name <span style="color: red;">*</span></label>
                                                <input type="text" name="last_name" id="" class="form-control" value="{{ old('last_name') }}" placeholder="Enter last name">
                                                @if($errors->has('last_name'))
                                                <div class="error" style="color:red;">{{ $errors->first('last_name') }}</div>
                                                @endif
                                            </div>
                                        </div> 
                                        </br>
                                         <div class="row">
                                            <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label">Email <span style="color: red;">*</span></label>
                                                <input type="text" name="email" id="" class="form-control" value="{{ old('email') }}" placeholder="Enter email">
                                                @if($errors->has('email'))
                                                <div class="error" style="color:red;">{{ $errors->first('email') }}</div>
                                                @endif
                                            </div>
                                             <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label">Phone</label>
                                                <input type="text" name="phone" id="" class="form-control phone-format" value="{{ old('phone') }}" placeholder="+1 123 456 7890">
                                                @if($errors->has('phone'))
                                                <div class="error" style="color:red;">{{ $errors->first('phone') }}</div>
                                                @endif
                                            </div>
                                        </div> 
                                        </br>
                                        <!--<div class="row">-->
                                        <!--    <div class="col-md-6">-->
                                        <!--        <label for="inputEnterYourName" class="col-form-label">Street address<span-->
                                        <!--            style="color: red;">*</span></label>-->
                                        <!--        <textarea name="address" class="form-control"></textarea>-->
                                        <!--        @if ($errors->has('address'))-->
                                        <!--            <div class="error" style="color:red;">-->
                                        <!--                {{ $errors->first('address') }}</div>-->
                                        <!--           @endif-->
                                        <!--    </div>-->
                                        <!--    <div class="col-md-6">-->
                                        <!--        <label for="inputEnterYourName" class="col-form-label"> State<span-->
                                        <!--            style="color: red;">*</span></label>-->
                                        <!--       <select class="form-select" name="state">-->
                                        <!--            @foreach ($states as $state)-->
                                        <!--                <option value="{{ $state->name }}">-->
                                        <!--                    {{ $state->name }}-->
                                        <!--                </option>-->
                                        <!--            @endforeach-->
                                        <!--        </select>-->
                                        <!--         @if($errors->has('state'))-->
                                        <!--        <div class="error" style="color:red;">{{ $errors->first('state') }}</div>-->
                                        <!--        @endif-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <!--</br>-->
                                        
                                        <!--<div class="row">-->
                                        <!--    <div class="col-md-6">-->
                                        <!--        <label for="inputEnterYourName" class="col-form-label">City<span-->
                                        <!--            style="color: red;">*</span></label>-->
                                        <!--        <input type="text" name="city" class="form-control" placeholder="Enter city">-->
                                        <!--        @if ($errors->has('city'))-->
                                        <!--            <div class="error" style="color:red;">-->
                                        <!--                {{ $errors->first('city') }}</div>-->
                                        <!--        @endif-->
                                        <!--    </div>-->
                                        <!--    <div class="col-md-6">-->
                                        <!--        <label for="inputEnterYourName" class="col-form-label"> Zipcode<span-->
                                        <!--            style="color: red;">*</span></label>-->
                                        <!--            <input type="text" name="zipcode" class="form-control" placeholder="Enter zipcode">-->
                                        <!--        @if ($errors->has('zipcode'))-->
                                        <!--            <div class="error" style="color:red;">-->
                                        <!--                {{ $errors->first('zipcode') }}</div>-->
                                        <!--        @endif-->
                                               
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <!--</br>-->
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label">Password <span style="color: red;">*</span></label>
                                                <input type="password" name="password" id="" class="form-control"  placeholder="Enter password">
                                                @if($errors->has('password'))
                                                <div class="error" style="color:red;">{{ $errors->first('password') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label">Confirm Password <span style="color: red;">*</span></label>
                                                <input type="password" name="confirm_password" id="" class="form-control"  placeholder="Enter confirm password">
                                                 @if($errors->has('confirm_password'))
                                                <div class="error" style="color:red;">{{ $errors->first('confirm_password') }}</div>
                                                @endif
                                            </div>
                                        </div> 
                                        </br>
                                        
                                         <div class="row">
                                            <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label">Image </label>
                                                <input type="file" name="image" id="" class="form-control" >
                                                @if($errors->has('image'))
                                                <div class="error" style="color:red;">{{ $errors->first('image') }}</div>
                                                @endif
                                            </div>
                                            
                                        </div> 
                                        
                                        <div class="row" style="margin-top: 20px; float: left;">
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn px-5 submit-btn">Create</button>
                                            </div>
                                        </div>
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
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.phone-format').mask('+1 999 999 9999');
        });
    </script>

@endpush